<?php

namespace App\Http\Livewire\Entregas;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Livewire;

class Busquedaavanzada extends Component
{
    public $estudiantes = null,$busquedaAvanzada = "";

    public function updatedbusquedaAvanzada(){
        if($this->busquedaAvanzada == ""){
            $this->reset(['estudiantes']);
        }else{
            $this->busquedasAvanzada();
        }
        
    }

    public function render()
    {
        return view('livewire.entregas.busquedaavanzada');
    }

    public function busquedasAvanzada(){
        $this->estudiantes = DB::table('estudiantes')
                                ->join('cursos','cursos.id','=','estudiantes.curso_id')
                                ->where('estudiantes.codigo','LIKE','%'.$this->busquedaAvanzada.'%')
                                ->orWhere('estudiantes.nombre','LIKE','%'.$this->busquedaAvanzada.'%')
                                ->orWhere('cursos.nombre','LIKE','%'.$this->busquedaAvanzada.'%')
                                ->select('estudiantes.id','estudiantes.nombre','estudiantes.codigo','cursos.nombre as curso')
                                ->get();

    }

    public function seleccionar($codigo){
        $this->reset(['estudiantes','busquedaAvanzada']);
        $this->emitTo('entregas.meriendas','buscaEstudianteAvanzada',$codigo);
        
    }
}
