<?php

namespace App\Http\Controllers;

use App\Models\Asignacione;
use App\Models\Empleado;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        $empleadoActual = Empleado::where('user_id',auth()->id())->first();
        if($empleadoActual)
        {
            $asignacion = Asignacione::where('empleado_id',$empleadoActual->id)->first();
            session(['miAsignacion' => $asignacion]);
        }       
        return view('home');
    }
}
