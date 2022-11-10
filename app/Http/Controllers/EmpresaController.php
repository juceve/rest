<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

/**
 * Class EmpresaController
 * @package App\Http\Controllers
 */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa = new Empresa();
        return view('empresa.create', compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('empresas.index')
            ->with('success', 'Empresa creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);

        return view('empresa.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);

        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        request()->validate(Empresa::$rules);

        $empresa->update($request->all());

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa editada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
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
