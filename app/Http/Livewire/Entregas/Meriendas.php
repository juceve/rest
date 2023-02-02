<?php

namespace App\Http\Livewire\Entregas;

use App\Models\Detallelonchera;
use App\Models\Estudiante;
use App\Models\Lonchera;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Meriendas extends Component
{
    public $dnIndividual = "", $dnCurso = "d-none", $dnVentas = "d-none";
    public $busquedaCodigo = "", $estudiante = null, $dnResultado = "d-none";
    public $lonchera = null;

    public function updatedBusquedaCodigo()
    {
        $this->reset(['estudiante', 'dnResultado', 'lonchera']);
    }

    protected $listeners = ['despachar'];

    public function render()
    {
        return view('livewire.entregas.meriendas')->extends('layouts.app');
    }

    public function mostrarIndividual()
    {
        $this->dnIndividual = "";
        $this->dnCurso = "d-none";
        $this->dnVentas = "d-none";
    }

    public function mostrarCurso()
    {
        $this->dnIndividual = "d-none";
        $this->dnCurso = "";
        $this->dnVentas = "d-none";
    }

    public function mostrarVentas()
    {
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
                $loncheras = Lonchera::where('fecha', date('Y-m-d'))
                    ->where('estudiante_id', $this->estudiante->id)
                    ->where('habilitado', true)
                    ->get();
                if ($loncheras->count() > 0) {
                    foreach ($loncheras as $lonchera) {
                        $this->lonchera = $lonchera;
                    }
                }
            }
        }
    }

    public function despachar($id)
    {
        DB::beginTransaction();
        try {
            $detalle = Detallelonchera::find($id);
            $detalle->entregado = true;
            $detalle->save();
            DB::commit();
            return redirect()->route('emeriendas')->with('success','Entrega realizada con exito!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('emeriendas')->with('error','No se generó la entrega');
        }
    }
}
