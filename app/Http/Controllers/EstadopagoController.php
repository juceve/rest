<?php

namespace App\Http\Controllers;

use App\Models\Estadopago;
use Illuminate\Http\Request;

/**
 * Class EstadopagoController
 * @package App\Http\Controllers
 */
class EstadopagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadopagos = Estadopago::paginate();

        return view('estadopago.index', compact('estadopagos'))
            ->with('i', (request()->input('page', 1) - 1) * $estadopagos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadopago = new Estadopago();
        return view('estadopago.create', compact('estadopago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Estadopago::$rules);

        $estadopago = Estadopago::create($request->all());

        return redirect()->route('estadopagos.index')
            ->with('success', 'Estadopago created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadopago = Estadopago::find($id);

        return view('estadopago.show', compact('estadopago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadopago = Estadopago::find($id);

        return view('estadopago.edit', compact('estadopago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estadopago $estadopago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estadopago $estadopago)
    {
        request()->validate(Estadopago::$rules);

        $estadopago->update($request->all());

        return redirect()->route('estadopagos.index')
            ->with('success', 'Estadopago updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estadopago = Estadopago::find($id)->delete();

        return redirect()->route('estadopagos.index')
            ->with('success', 'Estadopago deleted successfully');
    }
}
