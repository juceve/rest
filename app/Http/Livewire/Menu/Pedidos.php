<?php

namespace App\Http\Livewire\Menu;

use App\Models\Cartmenu;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Pedidos extends Component
{
    public $cart, $cartMenu = null, $countCart = 0, $semana = 0;

    public function mount()
    {
        $this->cartMenu = Cartmenu::where('session', session('idCarrito'))->orderBy('fecha','asc')->get();
        $this->countCart = $this->cartMenu->count();
    }

    protected $listeners = ['cargaContador', 'add' => 'addCart'];

    public function render()
    {
        $hoy = now();
        $hoyL = "";$fechaSegundos = strtotime($hoy);       
        switch (date('w', $fechaSegundos)) {
            case 0:
                $hoyL = "Domingo";
                break;
            case 1:
                $hoyL = "Lunes";
                break;
            case 2:
                $hoyL = "Martes";
                break;
            case 3:
                $hoyL = "Miercoles";
                break;
            case 4:
                $hoyL = "Jueves";
                break;
            case 5:
                $hoyL = "Viernes";
                break;
            case 6:
                $hoyL = "Sabado";
                break;
        }        
        $semana = date('W', $fechaSegundos) . '-' . date('Y');
        if($hoyL == 'Sabado'){
            $semana = date('W', $fechaSegundos) + 1;
            $semana = str_pad($semana, 2, "0", STR_PAD_LEFT) . '-' . date('Y');
            $this->semana = $semana;
        }  
        $fechaSegundosViernes = strtotime($hoy.' 21:00:00:00');
        if(($hoyL == 'Viernes') && ($fechaSegundos > $fechaSegundosViernes)){
            $semana = date('W', $fechaSegundos) + 1;
            $semana = str_pad($semana, 2, "0", STR_PAD_LEFT) . '-' . date('Y');
            $this->semana = $semana;
        }  

        $eventos = Evento::where('semana', $semana)->get();
        return view('livewire.menu.pedidos', compact('eventos'));
    }

    public function addCart($menu_id, $fecha)
    {

        DB::beginTransaction();
        try {
            $this->cart = Cartmenu::create([
                "session" => session('idCarrito'),
                "fecha" => $fecha,
                "menu_id" => $menu_id,
            ]);
            $this->cartMenu = Cartmenu::where('session', session('idCarrito'))
                                        ->orderBy('fecha','asc')
                                        ->get();
            $this->countCart = $this->cartMenu->count();
            DB::commit();
            $this->emit('actCon', $this->countCart);
            $this->emit('alertSuccess');
            $this->emit('selectButton', $fecha . '-' . $menu_id);
        } catch (\Throwable $th) {
            DB::rollback();
            $this->emit('alertError');
        }
    }

    public function nombre_dia($fecha)
    {
        
    }
}
