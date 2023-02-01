<?php

namespace App\Http\Livewire\Ventas;

use App\Models\Lonchera;
use App\Models\Pago;
use App\Models\Sucursale;
use App\Models\Tipopago;
use App\Models\Venta;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Aprobarpedido extends Component
{
    public $venta, $pago, $sucursale, $tipopago;


    public function mount($venta_id)
    {
        $this->venta = Venta::find($venta_id);
        $pago = Pago::where('venta_id', $this->venta->id)->get();
        foreach ($pago as $item) {
            $this->pago = $item;
        }
        $this->tipopago = Tipopago::find($this->pago->tipopago_id);
    }
    public function render()
    {
        return view('livewire.ventas.aprobarpedido')->extends('layouts.app');
    }

    protected $listeners = ['aprobarPedido'];

    public function aprobarPedido()
    {
        DB::beginTransaction();
        try {
            $this->venta->estadopago_id = 2;
            $this->venta->save();

            $this->pago->estadopago_id = 2;
            $this->pago->user_id = auth()->user()->id;
            // FALTA GENERAR EL RECIBO QUE VENDRÁ A SER LA FACTURA
            $this->pago->save();

            $loncheras = Lonchera::where('pago_id',$this->pago->id)->get();
            $lonchera =null;
            foreach ($loncheras as $item) {
                $lonchera = $item;
            }

            $lonchera->habilitado = true;
            $lonchera->save();

            DB::commit();
            return redirect()->route('vpagos')->with('success', 'Se efectuó la habilitación del Pedido.');
        } catch (\Throwable $th) {
            return redirect()->route('appedido',$this->venta->id)->with('error', 'Ha ocurrido un error, se no realizaron las acciones solicitadas.');
           DB::rollback();
        }
    }
}
