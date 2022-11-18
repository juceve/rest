<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit', 'update');
    }

    public function index()
    {
        $usuarios = "";

        if (Auth::user()->roles->pluck('name')[0] != 'SuperAdmin') {
            $usuarios = User::where('id','>',1);
            return view('user.index', compact('usuarios'));
        } else {
            $usuarios = User::all();
            return view('user.index', compact('usuarios'));
        }
    }


    public function edit(User $user)
    {
        $roles = Role::where('id', '>', 1)->get();
        return view('user.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('users.edit', $user)->with('success', 'Roles asignados correctamente!');
    }
}
