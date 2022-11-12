<?php

namespace App\Http\Livewire;

use App\Models\Sucursale;
use Livewire\Component;
use Livewire\WithPagination;

class Sucursales extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $search, $paginate=5; 
    public $sort ='id', $direction='desc';  

    public $empresa_id,$nombre,$direccion,$telefono;

    protected $listeners = ['render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function mount($id){
        $this->empresa_id = $id;        
    }

    public function render()
    {
        $sucursales = Sucursale::where([['empresa_id',$this->empresa_id],['nombre','like','%'.$this->search.'%']])
                                ->orWhere([['empresa_id',$this->empresa_id],['tipo','like','%'.$this->search.'%']])
                                    ->orderBy($this->sort,$this->direction)
                                    ->paginate($this->paginate);
        return view('livewire.sucursales',compact('sucursales'))->extends('layouts.app')->with('i', 0);
    }

    public function save(){
        $sucursale = Sucursale::create([
            "nombre" => $this->nombre,
            "direccion" => $this->direccion,
            "telefono" => $this->telefono,
            "empresa_id" => $this->empresa_id,
        ]);
        $this->reset(['nombre','direccion','telefono']);
        $this->emit('success','Sucursal creada correctamente');
    }

    public function order($sort){
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

    public function resetear(){
        $this->reset(['nombre','direccion','telefono']);
    }
}
