<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Nivelcurso;
use App\Models\Tutore;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Vinculosestudiantes extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $nombre, $cedula, $telefono,$curso_id, $tutore_id, $estudiante;

    protected $listeners = ['render', 'store', 'edit', 'resetear', 'destroy'];
    protected $rules = [
        'nombre' => 'required',
        'cedula' => 'required',
        'curso_id' => 'required',
    ];

    public function mount($id)
    {
        $this->tutore_id = $id;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $estudiantes = Estudiante::where('tutore_id', $this->tutore_id)
            ->paginate(5);

        $tutor = Tutore::find($this->tutore_id);
        $cursos = "";
        if (Auth::user()->sucursale_id != "") {
            $niveles = Nivelcurso::where('sucursale_id', Auth::user()->sucursale_id)->get();
            $cursos = array();
            $i=0;
            foreach ($niveles as $items) {
                $item = $items->cursos;
                foreach($item as $curso){
                    $cursos[$i] = $curso;
                    $i++;
                }                    
            }            
        } else {
            $cursos = Curso::all()->pluck('nombre', 'id');
        }
       
        return view('livewire.clientes.vinculosestudiantes', compact('tutor', 'estudiantes', 'cursos'))->extends('layouts.app');
    }

    public function store()
    {

        $estudiante = new Estudiante();
        $estudiante->nombre = $this->nombre;
        $estudiante->cedula = $this->cedula;
        $estudiante->telefono = $this->telefono;
        $estudiante->curso_id = $this->curso_id;
        $estudiante->tutore_id = $this->tutore_id;
        $this->validate();
        $estudiante->save();

        $codigo = Auth::user()->empresa_id . Auth::user()->sucursale_id . $estudiante->id;
        $estudiante->codigo = str_pad($codigo, 10, "0", STR_PAD_LEFT);
        $estudiante->save();

        $this->reset('nombre', 'cedula', 'telefono', 'curso_id', 'estudiante');
        $this->emit('alert', 'Estudiante creado correctamente');
    }

    public function edit($id)
    {
        $this->estudiante = Estudiante::find($id);
        $this->nombre = $this->estudiante->nombre;
        $this->cedula = $this->estudiante->cedula;
        $this->telefono = $this->estudiante->telefono;
        $this->curso_id = $this->estudiante->curso_id;
    }

    public function destroy($id)
    {
        $estudiante = Estudiante::find($id)->delete();
        $this->emit('alert', 'Estudiante eliminado correctamente');
    }

    public function resetear()
    {
        $this->reset('nombre', 'cedula', 'telefono', 'curso_id', 'estudiante');
    }

    public function update()
    {
        $this->estudiante->nombre = $this->nombre;
        $this->estudiante->cedula = $this->cedula;
        $this->estudiante->telefono = $this->telefono;
        $this->estudiante->curso_id = $this->curso_id;
        $this->validate();
        $this->estudiante->save();
        $this->reset('nombre', 'cedula', 'telefono', 'estudiante','curso_id');
        $this->emit('alert', 'Estudiante editado correctamente');
    }
}
