<?php

namespace App\Http\Livewire\Settings;

use App\Models\Tipopago;
use Livewire\Component;

class Tipopagos extends Component
{
    public $nombre;
    public $abreviatura;
    public $tipopago;
    protected $listeners = ['render','store','edit','resetear','destroy','update'];
   
    public function render()
    {
        $tipopagos = Tipopago::orderBy('id','desc')->get();
        return view('livewire.settings.tipopagos',compact('tipopagos'));
    }

    public function store()
    {  
        $tipopago = Tipopago::create([
            "nombre" => $this->nombre,
            "abreviatura" => $this->abreviatura,
        ]);

        $this->reset('nombre','abreviatura');
        $this->emit('alert','Tipo de Pago creado correctamente');
    }

    public function edit($id){
        $this->tipopago = Tipopago::find($id);
        $this->nombre = $this->tipopago->nombre;
        $this->abreviatura = $this->tipopago->abreviatura;
    }

    public function destroy($id){
        $tipopago = Tipopago::find($id)->delete();
        $this->emit('alert','Tipo de Pago eliminado correctamente');
    }

    public function resetear(){
        $this->reset('nombre','abreviatura');
    }

    public function update(){
        $this->tipopago->nombre = $this->nombre;
        $this->tipopago->abreviatura = $this->abreviatura;
        $this->tipopago->save();
        $this->reset('nombre','abreviatura','tipopago');
        $this->emit('alert','Tipo de pago editado correctamente');
    }

}
