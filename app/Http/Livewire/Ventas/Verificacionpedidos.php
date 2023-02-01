<?php

namespace App\Http\Livewire\Ventas;

use App\Models\Tipopago;
use App\Models\Venta;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Verificacionpedidos extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filtroBusqueda = "", $busqueda = "";

    public function updatedFiltroBusqueda(){
        $this->resetPage();
    }

    public function updatedBusqueda(){
        $this->resetPage();
    }

    public function render()
    {
       
        $tipopagos = Tipopago::all();
        $ventas = DB::table('pagos')
            ->join('ventas', 'ventas.id', '=', 'pagos.venta_id')
            ->join('estadopagos', 'estadopagos.id', '=', 'pagos.estadopago_id')
            ->select('ventas.*', 'pagos.tipopago','estadopagos.nombre AS estadopago')        
            ->where('ventas.estadopago_id',1)    
            ->where('pagos.tipopago', 'LIKE','%'.$this->filtroBusqueda.'%')
            ->where('cliente','LIKE','%'.$this->busqueda.'%')            
            ->paginate(5);
        return view('livewire.ventas.verificacionpedidos',compact('ventas','tipopagos'))->extends('layouts.app');
    }
}
