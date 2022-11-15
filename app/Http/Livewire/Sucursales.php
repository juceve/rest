<?php

namespace App\Http\Livewire;

use App\Models\Empresa;
use App\Models\Sucursale;
use Livewire\Component;
use Livewire\WithPagination;

class Sucursales extends Component
{
    use WithPagination;


    protected $paginationTheme = 'bootstrap';
    
    public $search, $paginate=5; 

    public $sort ='id', $direction='asc';  

    public $empresa_id,$empresa,$nombre,$direccion,$telefono,$sucursale;

    protected $listeners = ['render','desactivar','eliminar','editar'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function mount($id){
        $this->empresa_id = $id;  
        $this->empresa = Empresa::find($id);
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

    public function desactivar($id){
        $sucursale = Sucursale::find($id);
        if($sucursale->estado)
        {$sucursale->estado = false;}
        else
        {$sucursale->estado = true;}
        
        $sucursale->save();
        $this->emit('success','Se modifico el estado');
    }

    public function eliminar($id){
        $sucursale = Sucursale::find($id)->delete();
        $this->emit('success','Sucursal eliminada de la Base de Datos');
    }

    public function editar($id){
        $this->sucursale = Sucursale::find($id);
        $this->nombre = $this->sucursale->nombre;
        $this->direccion = $this->sucursale->direccion;
        $this->telefono = $this->sucursale->telefono;
    }

    public function update(){
        $this->sucursale->nombre = $this->nombre;
        $this->sucursale->direccion = $this->direccion;
        $this->sucursale->telefono = $this->telefono;
        $this->sucursale->save();
        $this->reset(['nombre','direccion','telefono']);
        $this->emit('success','Sucursal editada correctamente');
    }
}
