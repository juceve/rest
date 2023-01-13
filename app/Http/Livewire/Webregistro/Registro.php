<?php

namespace App\Http\Livewire\Webregistro;

use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Sucursale;
use App\Models\Tutore;
use Livewire\Component;

class Registro extends Component
{
    public $nombreT, $cedulaT, $telefonoT, $tutor = null, $busqueda, $dnone;
    public $dnoneEstudiantes = "d-none", $estudiantes;
    public $nombreE, $cedulaE, $telefonoE,$cursoE;
    public $colegio,$cursos=null;

    protected $listeners = ['registrarTutor'];

    public function updatedBusqueda()
    {
        $resultados = Tutore::where('cedula', $this->busqueda)->get();
        if ($resultados->count() > 0) {
            foreach ($resultados as $item) {
                $this->tutor = $item;
                $this->dnone = "d-none";
            }
            $this->nombreT = $this->tutor->nombre;
            $this->telefonoT = $this->tutor->telefono;
            $this->estudiantes = Estudiante::where('tutore_id', $this->tutor->id)->get();
            $this->dnoneEstudiantes = "";
        } else {
            $this->nombreT = "";
            $this->telefonoT = "";
            $this->dnone = "";
        }
    }

    public function updatedColegio(){
        $this->cursos = Curso::where('sucursale_id',$this->colegio);
        $this->render();
    }

    public function render()
    {        
        $colegios = Sucursale::all();
        return view('livewire.webregistro.registro',compact('colegios'))->extends('layouts.web');
    }

    public function registrarTutor()
    {
        try {
            $tutor = Tutore::create([
                "cedula" => $this->busqueda,
                "nombre" => $this->nombreT,
                "telefono" => $this->telefonoT,
            ]);
            $this->dnoneEstudiantes = "";
            $this->emit('regTutorSuc', 'exito');
        } catch (\Throwable $th) {
        }
    }

    public function registrarEstudiante()
    {
        try {
            $estudiante = Estudiante::create([
                "cedula" => $this->cedulaE,
                "nombre" => $this->nombreE,
                "telefono" => $this->telefonoE,
                "tutore_id" => $this->tutor->id
            ]);
            $this->estudiantes = Estudiante::where('tutore_id',$this->tutor->id);
            $this->emit('success','Estudiante registrado correctamente');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
