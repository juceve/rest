<?php

namespace App\Http\Livewire\Menu;

use App\Models\Cartmenu;
use App\Models\Estadopago;
use App\Models\Estudiante;
use App\Models\Logsid;
use App\Models\Pago;
use App\Models\Preciomenu;
use App\Models\Tipopago;
use App\Models\Venta;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use PHPUnit\Exception as PHPUnitException;

class Formapago extends Component
{
    use WithFileUploads;
    public $bCedula, $bNombre, $bColegio, $bCurso, $busquedaEst, $estudiante = null, $arrEstudiantes = array(), $dnone = "d-none";
    public $total_estudiante = 0, $tipoBusquedaEstudiante = "estudiante";
    public $cartMenu, $countCart, $formapago = 'local', $comprobante;

    public $logErrorPagos, $logErrorVentas;

    public function mount()
    {
        $this->cartMenu = Cartmenu::where('session', session('idCarrito'))->orderBy('fecha', 'asc')->get();
        $this->countCart = $this->cartMenu->count();
    }

    public function updatedBusquedaEst()
    {
        $this->resetForms();
    }
    public function render()
    {
        return view('livewire.menu.formapago')->extends('layouts.web2');
    }

    public function buscarEstudiante()
    {
        if ($this->busquedaEst != "") {
            $estudiantes = Estudiante::where('codigo', str_pad($this->busquedaEst, 10, "0", STR_PAD_LEFT))->get();
            $precioMerienda = 0;
            $precioAlmuerzo = 0;
            if ($estudiantes->count() > 0) {
                foreach ($estudiantes as $item) {
                    $this->estudiante = $item;
                    $this->busquedaEst = $item->codigo;
                    $this->bCedula = $item->cedula;
                    $this->bNombre = $item->nombre;
                    $this->bColegio = $item->curso->nivelcurso->sucursale->nombre;
                    $this->bCurso = $item->curso->nivelcurso->nombre . '-' . $item->curso->nombre;
                    $this->dnone = "";
                    $this->arrEstudiantes[] = $item->id;
                    $precio = 0;
                    foreach ($this->cartMenu as $cart) {
                        $precio = Preciomenu::where('sucursale_id', $item->curso->nivelcurso->sucursale_id)
                            ->where('nivelcurso_id', $item->curso->nivelcurso_id)
                            ->where('tipomenu_id', $cart->menu->tipomenu_id)
                            ->first();
                        $this->total_estudiante = ($this->total_estudiante + $precio->precio);
                    }
                }
            } else {
                $this->resetForms();
                $this->emit('ocultarEstPago');
                $this->emit('alertDanger');
            }
        }
    }

    public function resetForms()
    {
        $this->reset(['bCedula', 'bNombre', 'bColegio', 'bCurso',  'estudiante', 'arrEstudiantes', 'total_estudiante', 'dnone']);
    }

    public function next()
    {
        if ($this->countCart > 0) {
            switch ($this->formapago) {
                case 'local': {
                        DB::beginTransaction();
                        try {
                            $venta = $this->guardaVenta(1);
                            $this->logErrorVentas = $venta->id;
                            DB::commit();
                            $this->finalizaTransaccion();
                            return redirect()->route('fintransc', $venta->id);
                        } catch (\Throwable $th) {   
                            DB::rollBack();
                            if($this->logErrorVentas){
                                $log = $this->guardaLogError($this->logErrorVentas, 'ventas', $th->getMessage());
                            }
                            $this->emit('alertError', 'logID: '.$log->id);
                        }
                    }
                    break;
                case 'bancario': {
                        if (!is_null($this->comprobante)) {
                            DB::beginTransaction();
                            try {
                                $venta = $this->guardaVenta(1);
                                $this->logErrorVentas = $venta->id;
                                $pago = $this->guardaPago(1, 2, $venta->id);
                                $this->logErrorPagos = $pago->id;

                                $this->validate([
                                    'comprobante' => 'image|max:1024', // 1MB Max
                                ]);
                                $file = $this->comprobante->storeAs('depositos/bancarios',$venta->id.".".$this->comprobante->extension());
                                
                                DB::commit();
                                $this->finalizaTransaccion();
                                return redirect()->route('fintransc', $venta->id);
                            } catch (\Throwable $th) {
                                DB::rollBack();
                                if($this->logErrorVentas){
                                    $log = $this->guardaLogError($this->logErrorVentas, 'ventas', $th->getMessage());
                                }
                                if($this->logErrorPagos){
                                    $log = $this->guardaLogError($this->logErrorPagos, 'pagos', $th->getMessage());
                                }
                                
                                $this->emit('alertError', 'logID: '.$log->id);
                            }
                        } else {
                            $this->emit('alertComprobante');
                        }
                    }
                    break;
                case 'qr': {
                        if (!is_null($this->comprobante)) {
                            DB::beginTransaction();
                            try {
                                $venta = $this->guardaVenta(1);
                                $this->logErrorVentas = $venta->id;
                                $pago = $this->guardaPago(1, 3, $venta->id);
                                $this->logErrorPagos = $pago->id;

                                $this->validate([
                                    'comprobante' => 'image|max:1024', // 1MB Max
                                ]);
                                $file = $this->comprobante->storeAs('depositos/qr',$venta->id.".".$this->comprobante->extension());

                                DB::commit();
                                $this->finalizaTransaccion();
                                return redirect()->route('fintransc', $venta->id);
                            } catch (\Throwable $th) {
                                DB::rollBack();
                                if($this->logErrorVentas){
                                    $log = $this->guardaLogError($this->logErrorVentas, 'ventas', $th->getMessage());
                                }
                                if($this->logErrorPagos){
                                    $log = $this->guardaLogError($this->logErrorPagos, 'pagos', $th->getMessage());
                                }
                                
                                $this->emit('alertError', 'logID: '.$log->id);
                            }
                        } else {
                            $this->emit('alertComprobante');
                        }
                    }
                    break;
            }
        }
    }

    public function guardaVenta($estadopago_id)
    {
        $venta = Venta::create([
            'fecha' => now(),
            'cliente' => $this->estudiante->nombre,
            'estadopago_id' => 1,
            'importe' => $this->total_estudiante,
        ]);
        return $venta;
    }

    public function guardaLogError($id, $tabla, $observaciones)
    {
        $log = Logsid::create([
            'idgenerado' => $id,
            'tabla' => $tabla,
            'observaciones' => $observaciones
        ]);
        return $log;
    }

    public function guardaPago($estadopago_id, $tipopago_id, $venta_id)
    {
        $tipopago = Tipopago::find($tipopago_id);
        $pago = Pago::create([
            'recibo' => 0,
            'tipopago_id' => $tipopago->id,
            'tipopago' => $tipopago->nombre,
            'importe' => $this->total_estudiante,
            'venta_id' => $venta_id,
            'estadopago_id' => $estadopago_id,
        ]);
        return $pago;
    } 

    public function finalizaTransaccion(){
        $this->cartMenu = Cartmenu::where('session', session('idCarrito'))->delete();
        
    }
}
