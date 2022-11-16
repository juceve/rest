<?php

namespace App\Http\Livewire\Settings;

use App\Models\Estadopago;
use Livewire\Component;

class Estadopagos extends Component
{
    public $nombre;
    public $abreviatura;
    public $estadopago;
    protected $listeners = ['render','store','edit','resetear','destroy'];
   
    public function render()
    {
        $estadopagos = Estadopago::orderBy('id','desc')->get();
        return view('livewire.settings.estadopagos',compact('estadopagos'));
    }

    public function store()
    {  
        $estadopago = Estadopago::create([
            "nombre" => $this->nombre,
            "abreviatura" => $this->abreviatura,
        ]);

        $this->reset('nombre','abreviatura','estadopago');
        $this->emit('alert','Estado de pago creado correctamente');
    }

    public function edit($id){
        $this->estadopago = Estadopago::find($id);
        $this->nombre = $this->estadopago->nombre;
        $this->abreviatura = $this->estadopago->abreviatura;
    }

    public function destroy($id){
        $estadopago = Estadopago::find($id)->delete();
        $this->emit('alert','Estado de pago eliminado correctamente');
    }

    public function resetear(){
        $this->reset('nombre','abreviatura','estadopago');
    }

    public function update(){
        $this->estadopago->nombre = $this->nombre;
        $this->estadopago->abreviatura = $this->abreviatura;
        $this->estadopago->save();
        $this->reset('nombre','abreviatura','estadopago');
        $this->emit('alert','Estado de pago editado correctamente');
    }

}
