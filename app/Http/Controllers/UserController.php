<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit','update');
    }
    
    public function index()
    {
        $usuarios = User::all();
        return view('user.index',compact('usuarios'));
    }


    public function edit(User $user)    
    {
        $roles = Role::all();
       return view('user.edit',compact('user','roles'));
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('users.edit',$user)->with('success','Roles asignados correctamente!');
    }

}