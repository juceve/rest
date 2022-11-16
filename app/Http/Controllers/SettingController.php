<?php

namespace App\Http\Controllers;

use App\Models\Estadopago;
use App\Models\Tipopago;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:settings')->only('index');
    }

    public $tipopagos, $estadopagos;

    public function index(){
        
        $estadopagos = Estadopago::all();
        return view('setting.index',compact('estadopagos'));
    }
}
