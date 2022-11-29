<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Moneda;
use App\Models\Sucursale;
use Illuminate\Http\Request;


class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:empresas.index')->only('index');
        $this->middleware('can:empresas.edit')->only('edit','update');
        $this->middleware('can:empresas.create')->only('create','store');
        $this->middleware('can:empresas.destroy')->only('destroy');
    }

    public $foto = null;
    
    public function index()
    {
        $empresas = Empresa::all();

        return view('empresa.index', compact('empresas'));
    }


    public function create()
    {
        $empresa = new Empresa();
        $monedas=Moneda::all()->pluck('nombre','id');
        return view('empresa.create', compact('empresa','monedas'));
    }


    public function store(Request $request)
    {
        request()->validate(Empresa::$rules);

        $empresa = Empresa::create($request->all());
        $file = $request->file('avatar');
        if ($file) {
            $extension =  $file->clientExtension();
            $path = $file->storeAs(
                'img/empresas',
                $empresa->id . ".$extension"
            );
            $empresa->avatar = $path;
            $empresa->save();
        }
        else
        {
            $empresa->avatar = 'img/noImagen.jpg';
            $empresa->save();
        }

        $sucursale = Sucursale::create([
            'nombre' => $empresa->razonsocial,
            'direccion' => $empresa->direccion,
            'telefono' => $empresa->telefono,
            'empresa_id' => $empresa->id,
            'tipo' => 'CENTRAL',
        ]);

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa creada correctamente.');
    }


    public function show($id)
    {
        $empresa = Empresa::find($id);

        return view('empresa.show', compact('empresa'));
    }


    public function edit($id)
    {
        $empresa = Empresa::find($id);
        $monedas=Moneda::all()->pluck('nombre','id');
        return view('empresa.edit', compact('empresa','monedas'));
    }


    public function update(Request $request, Empresa $empresa)
    {
        request()->validate(Empresa::$rules);

        $empresa->update($request->all());
        $file = $request->file('avatar');
        if ($file) {
            $extension =  $file->clientExtension();
            $path = $file->storeAs(
                'img/empresas',
                $empresa->id . ".$extension"
            );
            $empresa->avatar = $path;
            $empresa->save();
        }

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa editada correctamente');
    }


    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        if ($empresa->estado) {
            $empresa->estado = false;
            $empresa->save();

            return redirect()->route('empresas.index')
                ->with('success', 'Empresa desactivada correctamente');
        } else {
            $empresa->estado = true;
            $empresa->save();

            return redirect()->route('empresas.index')
                ->with('success', 'Empresa activada correctamente');
        }
    }
}
