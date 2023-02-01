<?php

namespace App\Http\Controllers;

use App\Models\Asignacione;
use App\Models\Cargoempleado;
use App\Models\Empleado;
use App\Models\Sucursale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:empleados.index')->only('index');
        $this->middleware('can:empleados.edit')->only('edit','update');
        $this->middleware('can:empleados.create')->only('create','store');
        $this->middleware('can:empleados.destroy')->only('destroy');
        $this->middleware('can:empleados.disable')->only('disable');
    }
    public function index()
    {
        $empleados = "";
        if (!is_null(Auth::user()->empresa_id)) {
            $empleados = Empleado::where('empresa_id', Auth::user()->empresa_id)->get();
        } else {
            $empleados = Empleado::all();
        }

        return view('empleado.index', compact('empleados'))
            ->with('i', 0);
    }

    public function create()
    {
        $empleado = new Empleado();
        $cargos = Cargoempleado::all()->pluck('nombre', 'id');
        $sucursales = "";
        if (!is_null(Auth::user()->empresa_id)) {
            $sucursales = Sucursale::where([['empresa_id', Auth::user()->empresa_id]])->get()->pluck('nombre', 'id');
        } else {
            $sucursales = Sucursale::where('tipo', 'CENTRAL')->pluck('nombre', 'id');
        }

        return view('empleado.create', compact('empleado', 'cargos', 'sucursales'));
    }

    public function store(Request $request)
    {
        request()->validate(Empleado::$rules);
        DB::beginTransaction();
        try {
            $sucursale = Sucursale::find($request->sucursale_id);
            $empleado = Empleado::create($request->all());
            $empleado->empresa_id = $sucursale->empresa_id;
            $empleado->save();
            // GUARDA IMAGEN SI EXISTE
            $file = $request->file('avatar');
            if ($file) {
                $extension =  $file->clientExtension();
                $path = $file->storeAs(
                    'avatars/empleados',
                    $empleado->id . ".$extension"
                );
                $empleado->avatar = $path;
                $empleado->save();
            } else {
                $empleado->avatar = 'img/noImagen.jpg';
                $empleado->save();
            }

            // GENERA USUARIO DEL SISTEMA SI SE SOLICITA EN EL CHECKBOX
            if ($request->cbUsuario == "on") {
                $user = User::create([
                    "name" => $empleado->nombre,
                    "email" => $empleado->email,
                    "password" => bcrypt('12345678'),
                    "sucursale_id" => $sucursale->id,
                    "empresa_id" => $sucursale->empresa_id,
                ]);
                $empleado->user_id = $user->id;
                $empleado->save();
            }

            DB::commit();
            return redirect()->route('empleados.index')
                ->with('success', 'Empleado creado correctamente.');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('empleados.index')
                ->with('error', 'Error en la creacion del Empleado.');
        }
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);

        return view('empleado.show', compact('empleado'));
    }

    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $cargos = Cargoempleado::all()->pluck('nombre', 'id');

        $sucursales = "";
        if (!is_null(session('miAsignacion'))) {
            $rootAsignacion = session('miAsignacion');
            $sucursales = Sucursale::where([['empresa_id', $rootAsignacion->empresa_id], ['tipo', '<>', 'CENTRAL']])->get()->pluck('nombre', 'id');
        } else {
            $sucursales = Sucursale::all()->pluck('nombre', 'id');
        }        

        return view('empleado.edit', compact('empleado', 'cargos', 'sucursales'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        //request()->validate(Empleado::$rules);
        DB::beginTransaction();
        try {
            $empleado->update($request->all());

            $file = $request->file('avatar');
            if ($file) {
                $extension =  $file->clientExtension();
                $path = $file->storeAs(
                    'avatars/empleados',
                    $empleado->id . ".$extension"
                );
                $empleado->avatar = $path;
                $empleado->save();
            }

            if(!is_null($empleado->user_id)){
                $user = User::find($empleado->user_id);
                $user->sucursale_id = $request->sucursale_id;
                $user->save();
            }

            if ($request->cbUsuario == "on") {

                $user = User::create([
                    "name" => $empleado->nombre,
                    "email" => $empleado->email,
                    "password" => bcrypt('12345678'),
                    "sucursale_id" => $request->sucursale_id,
                    "empresa_id" => auth()->empresa_id,
                ]);
                $empleado->user_id = $user->id;
                $empleado->save();
            }
            DB::commit();
            return redirect()->route('empleados.index')
                ->with('success', 'Empleado editado correctamente');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('empleados.index')
                ->with('error', 'Error en la creacion del Empleado.');
        }
    }

    public function disable($id)
    {
        $empleado = empleado::find($id);
        if ($empleado->estado) {
            $empleado->estado = false;
            $empleado->save();

            $user = User::find($empleado->user_id);
            $user->estado = false;
            $user->save;

            return redirect()->route('empleados.index')
                ->with('success', 'Empleado desactivado correctamente');
        } else {
            $empleado->estado = true;
            $empleado->save();
            $user = User::find($empleado->user_id);
            $user->estado = true;
            $user->save;

            return redirect()->route('empleados.index')
                ->with('success', 'Empleado activado correctamente');
        }
    }

    public function destroy(Empleado $empleado)
    {
        try {
            $empleado->delete();
            return redirect()->route('empleados.index')
                ->with('success', 'Empleado eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('empleados.index')
                ->with('error', 'El registro no se puede eliminar, tiene vinculos activos.');
        }
    }
}
