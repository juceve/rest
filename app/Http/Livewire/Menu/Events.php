<?php

namespace App\Http\Livewire\Menu;

use App\Models\Detalleevento;
use App\Models\Detallemenu;
use App\Models\Evento;
use App\Models\Item;
use App\Models\Menu;
use App\Models\Tipomenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Events extends Component
{
    public $tipoid, $menus, $menu_id, $meriendas, $almuerzos, $meriendaid, $itemsMerienda, $itemsAlmuerzo, $almuerzoid, $fecha, $idEvento=0; 
    public $stockMerienda = 0, $stockAlmuerzo = 0;

    public function updatedTipoid()
    {
        $this->reset('menus', 'menu_id');
        $this->menus = Menu::where('tipomenu_id', $this->tipoid)->get();
    }

    public function mount()
    {
        $this->meriendas = Menu::where('tipomenu_id', 1)->get();
        $this->almuerzos = Menu::where('tipomenu_id', 2)->get();
    }

    public function updatedFecha(){
        $eventosFecha = Evento::where('fecha',$this->fecha)->get();
        
        if($eventosFecha->count()>0){
            foreach ($eventosFecha as $event) {
                
                $detalles = $event->detalleeventos;
                $this->idEvento = $event->id;
                foreach ($detalles as $detalle) {
                    if($detalle->tipo == 'MERIENDA'){
                        $this->meriendaid = $detalle->menu_id;
                        $this->itemsMerienda = Detallemenu::where('menu_id', $detalle->menu->id)->get();
                        $this->stockMerienda = $detalle->stock;
                    }
                    if($detalle->tipo == 'ALMUERZO'){
                        $this->almuerzoid = $detalle->menu_id;
                        $this->itemsAlmuerzo = Detallemenu::where('menu_id', $detalle->menu->id)->get();
                        $this->stockAlmuerzo = $detalle->stock;
                    }
                }
                
            }
            $this->emit('onDelete');
        }
    }

    public function updatedMeriendaid()
    {
        $this->itemsMerienda = Detallemenu::where('menu_id', $this->meriendaid)->get();
    }

    public function updatedAlmuerzoid()
    {
        $this->itemsAlmuerzo = Detallemenu::where('menu_id', $this->almuerzoid)->get();
    }

    public function render()
    {
        $tipos = Tipomenu::all();
        return view('livewire.menu.events', compact('tipos'))->extends('layouts.app');
    }

    protected $rules = [
        'meriendaid' => 'required',
        'almuerzoid' => 'required',
    ];

    public function cancelar()
    {
        $this->reset('almuerzoid', 'meriendaid', 'itemsAlmuerzo', 'itemsMerienda','stockMerienda', 'stockAlmuerzo','idEvento');
    }

    public function save()
    {
        DB::beginTransaction();
        try {
            if($this->idEvento==0){
                $fechaSegundos = strtotime($this->fecha);	
                $semana = date('W', $fechaSegundos);
                $evento = Evento::create([
                        'fecha' => $this->fecha,
                        'semana' => $semana.'-'.substr($this->fecha,0,4),
                        'user_id' => Auth::user()->id,
                    ]);
                    $this->idEvento = $evento->id;
            }else{
                Detalleevento::where('evento_id',$this->idEvento)->delete();
            }
            

            $detalleEvento1 = Detalleevento::create([
                'evento_id' => $this->idEvento,
                'menu_id' => $this->meriendaid,
                'stock' => $this->stockMerienda,
                'tipo' => 'MERIENDA'
            ]);

            $detalleEvento2 = Detalleevento::create([
                'evento_id' => $this->idEvento,
                'menu_id' => $this->almuerzoid,
                'stock' => $this->stockAlmuerzo,
                'tipo' => 'ALMUERZO'
            ]);

            DB::commit();
            $this->reset('almuerzoid', 'meriendaid', 'itemsAlmuerzo', 'itemsMerienda','stockMerienda', 'stockAlmuerzo','idEvento');
            return redirect()->route('programarmenu')
                            ->with('success','Evento guardado correctamente.');
        } catch (\Throwable $th) {            
            DB::rollBack();
            $this->reset('almuerzoid', 'meriendaid', 'itemsAlmuerzo', 'itemsMerienda','stockMerienda', 'stockAlmuerzo','idEvento');
            $this->emit('error', 'No se registro el Evento.');
        }
    }

    public function destroy(){
        DB::beginTransaction();
        try {
            Detalleevento::where('evento_id',$this->idEvento)->delete();
            Evento::find($this->idEvento)->delete();
            DB::commit();
            return redirect()->route('programarmenu')
                            ->with('success','Evento eliminado correctamente.');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('error', 'No se elmino el Evento.');
        }
        
    }
}
