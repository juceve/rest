<?php

namespace App\Http\Controllers;

use App\Models\Preciomenu;
use Illuminate\Http\Request;

/**
 * Class PreciomenuController
 * @package App\Http\Controllers
 */
class PreciomenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preciomenus = Preciomenu::paginate();

        return view('preciomenu.index', compact('preciomenus'))
            ->with('i', (request()->input('page', 1) - 1) * $preciomenus->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preciomenu = new Preciomenu();
        return view('preciomenu.create', compact('preciomenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Preciomenu::$rules);

        $preciomenu = Preciomenu::create($request->all());

        return redirect()->route('preciomenus.index')
            ->with('success', 'Preciomenu created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preciomenu = Preciomenu::find($id);

        return view('preciomenu.show', compact('preciomenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preciomenu = Preciomenu::find($id);

        return view('preciomenu.edit', compact('preciomenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Preciomenu $preciomenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preciomenu $preciomenu)
    {
        request()->validate(Preciomenu::$rules);

        $preciomenu->update($request->all());

        return redirect()->route('preciomenus.index')
            ->with('success', 'Preciomenu updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $preciomenu = Preciomenu::find($id)->delete();

        return redirect()->route('preciomenus.index')
            ->with('success', 'Preciomenu deleted successfully');
    }
}
