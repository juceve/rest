<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

class Settings extends Component
{
    protected $listeners = ['render'];
    
    public function render()
    {
        return view('livewire.settings.settings')->extends('layouts.app');
    }
}
