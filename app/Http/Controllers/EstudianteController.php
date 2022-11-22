<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Nivelcurso;
use App\Models\Tutore;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

/**
 * Class EstudianteController
 * @package App\Http\Controllers
 */
class EstudianteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:estudiantes.index')->only('index');
        $this->middleware('can:estudiantes.edit')->only('edit','update');
        $this->middleware('can:estudiantes.create')->only('create','store');
        $this->middleware('can:estudiantes.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::paginate();

        return view('estudiante.index', compact('estudiantes'))
            ->with('i', (request()->input('page', 1) - 1) * $estudiantes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiante = new Estudiante();
        $tutores = Tutore::all();
        $cursos = "";
        if (Auth::user()->sucursale_id != "") {
            $niveles = Nivelcurso::where('sucursale_id', Auth::user()->sucursale_id)->get();
            $cursos = array();
            $i=0;
            foreach ($niveles as $items) {
                $item = $items->cursos;
                foreach($item as $curso){
                    $cursos[$i] = $curso;
                    $i++;
                }                    
            }            
        } else {
            $cursos = Curso::all()->pluck('nombre', 'id');
        }

        return view('estudiante.create', compact('estudiante', 'cursos','tutores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(Estudiante::$rules);

        $estudiante = Estudiante::create($request->all());

        $codigo = Auth::user()->empresa_id . Auth::user()->sucursale_id . $estudiante->id;
        $estudiante->codigo = str_pad($codigo, 10, "0", STR_PAD_LEFT);
        $estudiante->save();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::find($id);

        return view('estudiante.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        $tutores = Tutore::all();
        $cursos = "";
        if (Auth::user()->sucursale_id != "") {
            $niveles = Nivelcurso::where('sucursale_id', Auth::user()->sucursale_id)->get();
            $cursos = array();
            $i=0;
            foreach ($niveles as $items) {
                $item = $items->cursos;
                foreach($item as $curso){
                    $cursos[$i] = $curso;
                    $i++;
                }                    
            }   
           
        } else {
            $cursos = Curso::all();
        }
        return view('estudiante.edit', compact('estudiante','cursos','tutores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estudiante $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        request()->validate(Estudiante::$rules);

        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante editado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id)->delete();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado correctamente');
    }
}
