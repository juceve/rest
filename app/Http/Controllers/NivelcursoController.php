<?php

namespace App\Http\Controllers;

use App\Models\Nivelcurso;
use Illuminate\Http\Request;

/**
 * Class NivelcursoController
 * @package App\Http\Controllers
 */
class NivelcursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivelcursos = Nivelcurso::paginate();

        return view('nivelcurso.index', compact('nivelcursos'))
            ->with('i', (request()->input('page', 1) - 1) * $nivelcursos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nivelcurso = new Nivelcurso();
        return view('nivelcurso.create', compact('nivelcurso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Nivelcurso::$rules);

        $nivelcurso = Nivelcurso::create($request->all());

        return redirect()->route('nivelcursos.index')
            ->with('success', 'Nivelcurso created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nivelcurso = Nivelcurso::find($id);

        return view('nivelcurso.show', compact('nivelcurso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nivelcurso = Nivelcurso::find($id);

        return view('nivelcurso.edit', compact('nivelcurso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Nivelcurso $nivelcurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nivelcurso $nivelcurso)
    {
        request()->validate(Nivelcurso::$rules);

        $nivelcurso->update($request->all());

        return redirect()->route('nivelcursos.index')
            ->with('success', 'Nivelcurso updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $nivelcurso = Nivelcurso::find($id)->delete();

        return redirect()->route('nivelcursos.index')
            ->with('success', 'Nivelcurso deleted successfully');
    }
}
