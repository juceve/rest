<?php

namespace App\Http\Livewire\Settings;

use App\Models\Catitem;
use Livewire\Component;

class Catitems extends Component
{
    public $nombre;
    public $catitem;
    protected $listeners = ['render', 'store', 'edit', 'resetear', 'destroy'];

    public function render()
    {
        $catitems = Catitem::orderBy('id', 'desc')->get();
        return view('livewire.settings.catitems', compact('catitems'));
    }

    public function store()
    {
        $catitem = Catitem::create([
            "nombre" => $this->nombre,
        ]);

        $this->reset('nombre', 'catitem');
        $this->emit('alert', 'Categoria creada correctamente');
    }

    public function edit($id)
    {
        $this->catitem = Catitem::find($id);
        $this->nombre = $this->catitem->nombre;
    }

    public function destroy($id)
    {
        try {
            $catitem = Catitem::find($id)->delete();
            $this->emit('alert', 'Categoria eliminada correctamente');
        } catch (\Throwable $th) {
            $this->emit('error', 'No se pudo eliminar el registro');
        }
    }

    public function resetear()
    {
        $this->reset('nombre', 'catitem');
    }

    public function update()
    {
        $this->catitem->nombre = $this->nombre;
        $this->catitem->save();
        $this->reset('nombre', 'catitem');
        $this->emit('alert', 'Categoria editada correctamente');
    }
}
