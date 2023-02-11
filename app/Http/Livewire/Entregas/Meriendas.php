<?php

namespace App\Http\Livewire\Entregas;

use App\Http\Livewire\Settings\nivelcursos;
use App\Models\Detalleevento;
use App\Models\Detallelonchera;
use App\Models\Detallemenu;
use App\Models\Estudiante;
use App\Models\Evento;
use App\Models\Lonchera;
use App\Models\Pago;
use App\Models\Preciomenu;
use App\Models\Tipomenu;
use App\Models\Tipopago;
use App\Models\Venta;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Meriendas extends Component
{
    public $dnIndividual = "", $dnCurso = "d-none", $dnVentas = "d-none";
    public $busquedaCodigo = "", $estudiante = null, $dnResultado = "d-none", $estudiantes;
    public $lonchera = null, $detalles = null;
    public $evento = null, $detalleDia;

    public $selCurso = "", $tipomenu_id = "", $alumnos = null;

    public $tipopagos = null, $tipopago = 1;

    public function updatedBusquedaCodigo()
    {
        $this->resetForms();
        $this->reset(['estudiante', 'dnResultado']);
    }

    public function resetForms()
    {
        $this->reset(['lonchera', 'detalles', 'alumnos']);
    }

    public function updatedSelCurso()
    {
        $this->alumnos = null;
    }

    public function updatedTipomenu_id()
    {
        $this->alumnos = null;
    }

    public function mount()
    {
        $this->tipopagos = Tipopago::all();
        $eventos = Evento::where('fecha', date('Y-m-d'))->get();
        $detalles = null;
        foreach ($eventos as $evento) {
            $this->detalleDia = $evento->detalleeventos;
        }
    }

    protected $listeners = ['despachar', 'buscaEstudianteAvanzada', 'despacharCurso', 'comprar'];

    public function render()
    {

        $cursos = DB::table('cursos')
            ->join('nivelcursos', 'nivelcursos.id', '=', 'cursos.nivelcurso_id')
            ->select('cursos.id', 'cursos.nombre as curso', 'nivelcursos.nombre as nivel')
            ->orderBy('cursos.nivelcurso_id', 'asc')
            ->orderBy('cursos.nombre', 'asc')
            ->get();

        $tipos = Tipomenu::all();


        return view('livewire.entregas.meriendas', compact('cursos', 'tipos'))->extends('layouts.app');
    }

    public function comprar($menu_id, $tipomenu_id)
    {
        if (!is_null($this->estudiante)) {
            $this->buscarEstudiante();
            $b = 0;
            foreach ($this->detalles as $detalle) {
                if ($detalle->tipomenu_id == $tipomenu_id) {
                    $b = 1;
                }
            }
            if ($b == 0) {
                DB::beginTransaction();
                try {
                    $preciomenu = Preciomenu::where('tipomenu_id', $tipomenu_id)
                        ->where('nivelcurso_id', $this->estudiante->curso->nivelcurso_id)
                        ->first();
                    $tipopago = Tipopago::find($this->tipopago);
                    $venta = Venta::create([
                        "fecha" => date('Y-m-d'),
                        "cliente" => $this->estudiante->nombre,
                        "estadopago_id" => 2,
                        "importe" => $preciomenu->precio,
                    ]);

                    $pago = Pago::create([
                        "recibo" => 0,
                        "tipopago_id" => $tipopago->id,
                        "tipopago" => $tipopago->nombre,
                        "sucursal_id" => $this->estudiante->curso->nivelcurso->sucursale->id,
                        "sucursal" => $this->estudiante->curso->nivelcurso->sucursale->nombre,
                        "importe" => $preciomenu->precio,
                        "venta_id" => $venta->id,
                        "estadopago_id" => 2,
                        "user_id" => auth()->user()->id,
                    ]);

                    if (is_null($this->lonchera)) {
                        $this->lonchera = Lonchera::create([
                            "fecha" => date('Y-m-d'),
                            "estudiante_id" => $this->estudiante->id,
                            "pago_id" => $pago->id,
                            "habilitado" => 1,
                        ]);
                    }
                    $detallelonchera = Detallelonchera::create([
                        'fecha' => date('Y-m-d'),
                        'menu_id' => $menu_id,
                        'lonchera_id' => $this->lonchera->id,
                        'entregado' => false
                    ]);
                    DB::commit();
                    $this->emit('success', 'Compra realizada, debe entregar el pedido por la pestaña Individual');
                } catch (\Throwable $th) {
                    DB::rollback();
                    $this->emit('error', 'Se ha producido un error, no se registró el pedido');
                }
            } else {
                $this->emit('warning', 'El producto que intenta comprar ya fue adquirido');
            }
        } else {
            $this->emit('warning', 'Debe seleccionar un estudiante');
        }
    }

    public function mostrarIndividual()
    {
        $this->resetForms();
        // $this->busquedaCodigo = "";
        if ($this->busquedaCodigo != "") {
            $this->buscarEstudiante();
        }
        $this->dnIndividual = "";
        $this->dnCurso = "d-none";
        $this->dnVentas = "d-none";
    }

    public function mostrarCurso()
    {

        $this->reset(['lonchera', 'detalles', 'dnResultado', 'busquedaCodigo']);
        $this->resetForms();
        $this->dnIndividual = "d-none";
        $this->dnCurso = "";
        $this->dnVentas = "d-none";
    }

    public function buscarXCurso()
    {

        if ($this->selCurso != "" && $this->tipomenu_id != "") {
            $this->alumnos = DB::table('estudiantes')
                ->join('cursos', 'estudiantes.curso_id', '=', 'cursos.id')
                ->join('loncheras', 'loncheras.estudiante_id', '=', 'estudiantes.id')
                ->join('detalleloncheras', 'detalleloncheras.lonchera_id', '=', 'loncheras.id')
                ->join('menus', 'menus.id', '=', 'detalleloncheras.menu_id')
                ->join('tipomenus', 'tipomenus.id', '=', 'menus.tipomenu_id')
                ->where('detalleloncheras.fecha', date('Y-m-d'))
                ->where('curso_id', $this->selCurso)
                ->where('loncheras.habilitado', 1)
                ->where('detalleloncheras.entregado', 0)
                ->where('tipomenus.id', $this->tipomenu_id)
                ->select('loncheras.id as lonchera_id', 'detalleloncheras.id as detalleid', 'estudiantes.id as estudiante_id', 'estudiantes.codigo', 'estudiantes.nombre as estudiante')
                ->get();

            if ($this->alumnos->count() > 0) {
            } else {
                $this->emit('sinresultados');
            }
            // 'cursos.nombre as curso', 'detalleloncheras.fecha as fecha', 'detalleloncheras.menu_id', 'menus.nombre as menu', 'menus.tipomenu_id', 'tipomenus.nombre as tipomenu', 'detalleloncheras.entregado'
        }
    }

    public function despacharCurso()
    {
        if (!is_null($this->alumnos)) {
            DB::beginTransaction();
            try {
                foreach ($this->alumnos as $alumno) {

                    $detalle = Detallelonchera::find($alumno['detalleid']);

                    $detalle->entregado = true;
                    $detalle->save();
                }
                $this->resetForms();
                DB::commit();
                return redirect()->route('emeriendas')->with('success', 'Entrega realizada con exito!');
            } catch (\Throwable $th) {
                DB::rollback();
                return redirect()->route('emeriendas')->with('error', $th->getMessage());
            }
        }
    }

    public function cancelarCurso()
    {
        $this->reset(['selCurso', 'tipomenu_id', 'alumnos']);
    }

    public function mostrarVentas()
    {
        $this->resetForms();
        if ($this->busquedaCodigo != "") {
            $this->buscarEstudiante();
        }
        // $this->busquedaCodigo = "";
        $this->dnIndividual = "d-none";
        $this->dnCurso = "d-none";
        $this->dnVentas = "";
    }

    public function buscarEstudiante()
    {
        if ($this->busquedaCodigo != "") {
            $estudiantes = Estudiante::where('codigo', str_pad($this->busquedaCodigo, 10, "0", STR_PAD_LEFT))->get();
            if ($estudiantes->count() > 0) {
                foreach ($estudiantes as $item) {
                    $this->estudiante = $item;
                    $this->busquedaCodigo = $item->codigo;
                    $this->dnResultado = "";
                }
                $this->detalles = DB::table('loncheras')
                    ->join('detalleloncheras', 'loncheras.id', '=', 'detalleloncheras.lonchera_id')
                    ->join('menus', 'menus.id', '=', 'detalleloncheras.menu_id')
                    ->where('loncheras.estudiante_id', $this->estudiante->id)
                    ->where('loncheras.habilitado', true)
                    ->where('detalleloncheras.fecha', date('Y-m-d'))
                    // ->where('detalleloncheras.entregado', false)
                    ->select('loncheras.id as lonchera_id', 'detalleloncheras.id', 'detalleloncheras.entregado', 'menus.nombre', 'menus.descripcion', 'menus.tipomenu_id')
                    ->get();

                $this->lonchera = Lonchera::where('estudiante_id', $this->estudiante->id)->first();
            }
        }
    }

    public function buscaEstudianteAvanzada($codigo)
    {
        $this->busquedaCodigo = $codigo;
        $this->buscarEstudiante();
    }

    public function borrar()
    {
        $this->reset(['busquedaCodigo', 'dnResultado', 'estudiante']);
    }

    public function despachar($id)
    {
        DB::beginTransaction();
        try {
            $detalle = Detallelonchera::find($id);
            $detalle->entregado = true;
            $detalle->save();
            DB::commit();
            return redirect()->route('emeriendas')->with('success', 'Entrega realizada con exito!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('emeriendas')->with('error', 'No se generó la entrega');
        }
    }
}
