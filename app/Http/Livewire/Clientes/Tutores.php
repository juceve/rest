<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Tutore;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Tutores extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search, $paginate = 5;

    public $sort = 'id', $direction = 'desc';

    public $nombre, $cedula, $telefono, $tutor;

    protected $listeners = ['render', 'store', 'edit', 'resetear', 'destroy'];
    protected $rules = [
        'nombre' => 'required',
        'cedula' => 'required',
        'telefono' => 'required',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $tutores = Tutore::where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('cedula', 'like', '%' . $this->search . '%')
            ->orWhere('telefono', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->paginate);

        $tutor = new Tutore();
        return view('livewire.clientes.tutores', compact('tutor', 'tutores'))->extends('layouts.app');
    }

    public function store()
    {

        $tutor = new Tutore();
        $tutor->nombre = $this->nombre;
        $tutor->cedula = $this->cedula;
        $tutor->telefono = $this->telefono;
        $this->validate();
        $tutor->save();

        $this->reset('nombre', 'cedula');
        $this->emit('alert', 'Tutor creado correctamente');
    }

    public function edit($id)
    {
        $this->tutor = Tutore::find($id);
        $this->nombre = $this->tutor->nombre;
        $this->cedula = $this->tutor->cedula;
        $this->telefono = $this->tutor->telefono;
    }

    public function destroy($id)
    {
        $tutor = Tutore::find($id)->delete();
        $this->emit('alert', 'Tutor eliminado correctamente');
    }

    public function resetear()
    {
        $this->reset('nombre', 'cedula', 'telefono', 'tutor');
    }

    public function update()
    {
        $this->tutor->nombre = $this->nombre;
        $this->tutor->cedula = $this->cedula;
        $this->tutor->telefono = $this->telefono;
        $this->validate();
        $this->tutor->save();
        $this->reset('nombre', 'cedula', 'telefono', 'tutor');
        $this->emit('alert', 'Tutor editado correctamente');
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
