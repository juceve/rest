<?php

namespace App\Http\Livewire\Settings;

use App\Models\Area;
use Livewire\Component;

class Areas extends Component
{

    public $nombre;
    public $area;
    protected $listeners = ['render','store','edit','resetear','destroy'];
   
    public function render()
    {
        $areas = Area::orderBy('id','desc')->get();
        return view('livewire.settings.areas',compact('areas'));
    }

    public function store()
    {  
        $area = Area::create([
            "nombre" => $this->nombre,
        ]);

        $this->reset('nombre','area');
        $this->emit('alert','Area creado correctamente');
    }

    public function edit($id){
        $this->area = Area::find($id);
        $this->nombre = $this->area->nombre;
    }

    public function destroy($id){
        $area = Area::find($id)->delete();
        $this->emit('alert','Area eliminado correctamente');
    }

    public function resetear(){
        $this->reset('nombre','area');
    }

    public function update(){
        $this->area->nombre = $this->nombre;
        $this->area->save();
        $this->reset('nombre','area');
        $this->emit('alert','Area editado correctamente');
    }
}
