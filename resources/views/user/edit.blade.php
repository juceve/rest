@extends('layouts.app')

@section('template_title')
Editar Roles Usuarios | 
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <span>ASIGNACION DE ROLES</span>
    </div>
    <div class="card-body">
        <p class="h5">Nombre: </p>
        <p class="form-control">{{$user->name}}</p>
        <hr>
        {!! Form::model($user, ['route'=>['users.update', $user], 'method' => 'put']) !!}
        <h2 class="h5">Listado de Roles</h2>
        @foreach ($roles as $role)
        <div>
            <label for="">
                {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                {{$role->name}}
            </label>
        </div>            
        @endforeach
        {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection