<?php

namespace App\Http\Livewire\Items;

use Livewire\Component;

class Crear extends Component
{
    public function render()
    {
        return view('livewire.items.crear')->extends('layouts.app');
    }
}
