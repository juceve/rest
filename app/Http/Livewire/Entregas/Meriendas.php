<?php

namespace App\Http\Livewire\Entregas;

use App\Http\Livewire\Settings\nivelcursos;
use App\Models\Detalleevento;
use App\Models\Detallelonchera;
use App\Models\Detallemenu;
use App\Models\Estudiante;
use App\Models\Evento;
use App\Models\Lonchera;
use App\Models\Tipomenu;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Meriendas extends Component
{
    public $dnIndividual = "", $dnCurso = "d-none", $dnVentas = "d-none";
    public $busquedaCodigo = "", $estudiante = null, $dnResultado = "d-none";
    public $lonchera = null, $detalles = null;
    public $evento = null, $detalleDia;

    public $selCurso = "", $tipomenu_id = "", $estudiantes = null;

    public function updatedBusquedaCodigo()
    {
        $this->resetForms();
        $this->reset(['estudiante','dnResultado']);
    }

    public function resetForms()
    {
        $this->reset(['lonchera', 'detalles']);
    }

    public function mount()
    {
        $eventos = Evento::where('fecha', date('Y-m-d'))->get();
        $detalles = null;
        foreach ($eventos as $evento) {
            $this->detalleDia = $evento->detalleeventos;
        }
    }

    protected $listeners = ['despachar', 'buscaEstudianteAvanzada'];

    public function render()
    {
        
        $cursos = DB::table('cursos')
            ->join('nivelcursos', 'nivelcursos.id', '=', 'cursos.nivelcurso_id')
            ->select('cursos.id', 'cursos.nombre as curso', 'nivelcursos.nombre as nivel')
            ->orderBy('cursos.nivelcurso_id', 'asc')
            ->orderBy('cursos.nombre', 'asc')
            ->get();

            $tipos = Tipomenu::all();


        return view('livewire.entregas.meriendas', compact('cursos','tipos'))->extends('layouts.app');
    }

    public function mostrarIndividual()
    {
        $this->resetForms();
        // $this->busquedaCodigo = "";
        $this->dnIndividual = "";
        $this->dnCurso = "d-none";
        $this->dnVentas = "d-none";
    }

    public function mostrarCurso()
    {

        $this->reset(['lonchera', 'detalles', 'dnResultado', 'busquedaCodigo']);
        $this->dnIndividual = "d-none";
        $this->dnCurso = "";
        $this->dnVentas = "d-none";
    }

    public function buscarXCurso()
    {
        $this->reset(['estudiantes']);
        if($this->selCurso != "" && $this->tipomenu_id != ""){
            $this->estudiantes = DB::table('estudiantes')
            ->join('cursos', 'estudiantes.curso_id', '=', 'cursos.id')
            ->join('loncheras', 'loncheras.estudiante_id', '=', 'estudiantes.id')
            ->join('detalleloncheras', 'detalleloncheras.lonchera_id', '=', 'loncheras.id')
            ->join('menus', 'menus.id', '=', 'detalleloncheras.menu_id')
            ->join('tipomenus', 'tipomenus.id', '=', 'menus.tipomenu_id')
            ->where('detalleloncheras.fecha',date('Y-m-d'))
            ->where('curso_id', $this->selCurso)
            ->where('loncheras.habilitado', 1)
            ->where('detalleloncheras.entregado' , 0)
            ->where('tipomenus.id' , $this->tipomenu_id)
            ->select('loncheras.id as lonchera_id','estudiantes.id as estudiante_id', 'estudiantes.codigo','estudiantes.nombre as estudiante')
            ->get();            
            // 'cursos.nombre as curso', 'detalleloncheras.fecha as fecha', 'detalleloncheras.menu_id', 'menus.nombre as menu', 'menus.tipomenu_id', 'tipomenus.nombre as tipomenu', 'detalleloncheras.entregado'
        }        
       
    }

    public function mostrarVentas()
    {
        $this->resetForms();
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
                    ->select('detalleloncheras.id', 'detalleloncheras.entregado', 'menus.nombre', 'menus.descripcion', 'menus.tipomenu_id')
                    ->get();
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
