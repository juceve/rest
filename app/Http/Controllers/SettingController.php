<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:settings')->only('index');
    }

    public function index(){
        return view('setting.index');
    }
}
