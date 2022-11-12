<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Sucursale;
use Illuminate\Http\Request;


class SucursaleController extends Controller
{

    public function index($id)
    {
        $sucursales = Sucursale::where('empresa_id',$id)->paginate();

        return view('sucursale.index', compact('sucursales'))
            ->with('i', (request()->input('page', 1) - 1) * $sucursales->perPage());
    }


    public function create()
    {
        $sucursale = new Sucursale();
        return view('sucursale.create', compact('sucursale'));
    }

  
    public function store(Request $request)
    {
        request()->validate(Sucursale::$rules);

        $sucursale = Sucursale::create($request->all());

        return redirect()->route('sucursales.index')
            ->with('success', 'Sucursale created successfully.');
    }

   
    public function show(Sucursale $sucursal)
    {
        $sucursale = Sucursale::find($id);

        return view('sucursale.show', compact('sucursale'));
    }

    
    public function edit(Empresa $empresa)
    {
        $sucursales = Sucursale::where('empresa_id',$empresa->id)->get();

        return view('sucursale.edit', compact('sucursales'));
    }

  
    public function update(Request $request, Sucursale $sucursale)
    {
        request()->validate(Sucursale::$rules);

        $sucursale->update($request->all());

        return redirect()->route('sucursales.index')
            ->with('success', 'Sucursale updated successfully');
    }


    public function destroy($id)
    {
        $sucursale = Sucursale::find($id)->delete();

        return redirect()->route('sucursales.index')
            ->with('success', 'Sucursale deleted successfully');
    }
}
