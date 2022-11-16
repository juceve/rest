@extends('layouts.app')

@section('template_title')
    EDITAR ROL
@endsection

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
                FORMULARIO DE EDICIÓN
            </span>
            {{-- @can('roles.create') --}}
            <div class="float-right">
                <a href="{{route('roles.index')}}" class="btn btn-warning btn-sm float-right"
                    data-placement="left">
                    <i class="fas fa-arrow-left"></i>
                    Volver
                </a>
            </div>
            {{-- @endcan --}}

        </div>
    </div>
    <div class="card-body">
        {!! Form::model($role, ['route'=>['roles.update',$role], 'method' => 'put']) !!}
            @include('roles.form')
            {!! Form::submit('Editar rol', ['class'=>'btn btn-primary px-5']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection