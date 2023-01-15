<?php

namespace App\Http\Livewire\Menu;

use App\Models\Cartmenu;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Pedidos extends Component
{
    public $cart, $cartMenu = null, $countCart = 0;

    public function mount()
    {
        $this->countCart = Cartmenu::where('session', session('idCarrito'))->count();
    }

    protected $listeners = ['cargaContador'];

    public function render()
    {
        $hoy = date('Y-m-d');
        $fechaSegundos = strtotime($hoy);
        $semana = date('W', $fechaSegundos) . '-' . date('Y');
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
            $this->countCart = Cartmenu::where('session', session('idCarrito'))->count();

            DB::commit();
            $this->emit('actualizaContador', $this->countCart);
            $this->emit('alertSuccess');
        } catch (\Throwable $th) {
            DB::rollback();
            $this->emit('alertError');
        }
    }
}
