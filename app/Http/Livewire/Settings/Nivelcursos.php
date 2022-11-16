<?php

namespace App\Http\Livewire\Settings;

use App\Models\Nivelcurso;
use App\Models\Sucursale;
use Livewire\Component;

class nivelcursos extends Component
{
    public $nombre;
    public $sucursale_id;
    public $nivelcurso;
    protected $listeners = ['render','store','edit','resetear','destroy'];
   
    public function render()
    {
        $niveles = Nivelcurso::orderBy('id','desc')->get();
        $sucursales = Sucursale::all()->pluck('nombre','id');
        return view('livewire.settings.nivelcursos',compact('niveles','sucursales'));
    }

    public function store()
    {  
        $nivelcurso = Nivelcurso::create([
            "nombre" => $this->nombre,
            "sucursale_id" => $this->sucursale_id,
        ]);

        $this->reset('nombre','sucursale_id','nivelcurso');
        $this->emit('alert','Nivel creado correctamente');
    }

    public function edit($id){
        $this->nivelcurso = Nivelcurso::find($id);
        $this->nombre = $this->nivelcurso->nombre;
        $this->sucursale_id = $this->nivelcurso->sucursale_id;
    }

    public function destroy($id){
        $nivelcurso = Nivelcurso::find($id)->delete();
        $this->emit('alert','Nivel eliminado correctamente');
    }

    public function resetear(){
        $this->reset('nombre','sucursale_id','nivelcurso');
    }

    public function update(){
        $this->nivelcurso->nombre = $this->nombre;
        $this->nivelcurso->sucursale_id = $this->sucursale_id;
        $this->nivelcurso->save();
        $this->reset('nombre','sucursale_id','nivelcurso');
        $this->emit('alert','Nivel editado correctamente');
    }

}
