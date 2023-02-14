<?php

namespace App\Http\Livewire\Ventas;

use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;

class Listado extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $busqueda = "";

    public function updatingBusqueda()
    {
        $this->resetPage();
    }

    public function render()
    {
        $ventas = Venta::where('id',$this->busqueda)
        ->orWhere('cliente','LIKE','%'.$this->busqueda.'%')
        ->orWhere('cliente','LIKE','%'.$this->busqueda.'%')
        ->paginate(7);
        return view('livewire.ventas.listado',compact('ventas'));
    }
}
