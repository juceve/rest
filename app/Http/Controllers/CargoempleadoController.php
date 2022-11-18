<?php

namespace App\Http\Controllers;

use App\Models\Cargoempleado;
use Illuminate\Http\Request;

/**
 * Class CargoempleadoController
 * @package App\Http\Controllers
 */
class CargoempleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargoempleados = Cargoempleado::paginate();

        return view('cargoempleado.index', compact('cargoempleados'))
            ->with('i', (request()->input('page', 1) - 1) * $cargoempleados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargoempleado = new Cargoempleado();
        return view('cargoempleado.create', compact('cargoempleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cargoempleado::$rules);

        $cargoempleado = Cargoempleado::create($request->all());

        return redirect()->route('cargoempleados.index')
            ->with('success', 'Cargoempleado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cargoempleado = Cargoempleado::find($id);

        return view('cargoempleado.show', compact('cargoempleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargoempleado = Cargoempleado::find($id);

        return view('cargoempleado.edit', compact('cargoempleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cargoempleado $cargoempleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargoempleado $cargoempleado)
    {
        request()->validate(Cargoempleado::$rules);

        $cargoempleado->update($request->all());

        return redirect()->route('cargoempleados.index')
            ->with('success', 'Cargoempleado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cargoempleado = Cargoempleado::find($id)->delete();

        return redirect()->route('cargoempleados.index')
            ->with('success', 'Cargoempleado deleted successfully');
    }
}
