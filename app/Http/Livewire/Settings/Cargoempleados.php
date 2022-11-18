<?php

namespace App\Http\Livewire\Settings;

use App\Models\Area;
use App\Models\Cargoempleado;
use Livewire\Component;

class Cargoempleados extends Component
{
    public $nombre;
    public $area_id;
    public $cargoempleado;
    protected $listeners = ['render','store','edit','resetear','destroy'];
   
    public function render()
    {
        $cargos = Cargoempleado::orderBy('id','desc')->get();
        $areas = Area::all()->pluck('nombre','id');
        return view('livewire.settings.cargoempleados',compact('cargos','areas'));
    }

    public function store()
    {  
        $cargoempleado = Cargoempleado::create([
            "nombre" => $this->nombre,
            "area_id" => $this->area_id,
        ]);

        $this->reset('nombre','area_id','cargoempleado');
        $this->emit('alert','Cargo creado correctamente');
    }

    public function edit($id){
        $this->cargoempleado = Cargoempleado::find($id);
        $this->nombre = $this->cargoempleado->nombre;
        $this->area_id = $this->cargoempleado->area_id;
    }

    public function destroy($id){
        $cargoempleado = Cargoempleado::find($id)->delete();
        $this->emit('alert','Cargo eliminado correctamente');
    }

    public function resetear(){
        $this->reset('nombre','area_id','cargoempleado');
    }

    public function update(){
        $this->cargoempleado->nombre = $this->nombre;
        $this->cargoempleado->area_id = $this->area_id;
        $this->cargoempleado->save();
        $this->reset('nombre','area_id','cargoempleado');
        $this->emit('alert','Cargo editado correctamente');
    }
}
