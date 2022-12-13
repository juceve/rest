<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use App\Models\Tipomenu;
use Livewire\Component;

class Selects extends Component
{
    public $tipoid,$menus,$menu_id;

    public function updatedTipoid(){
        $this->reset('menus','menu_id');
        $this->menus = Menu::where('tipomenu_id',$this->tipoid)->get();
    }

    public function render()
    {
        $tipos = Tipomenu::all();
        return view('livewire.selects',compact('tipos'));
    }
}
