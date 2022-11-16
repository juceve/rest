@extends('layouts.app')

@section('template_title')
REGISTRAR ROL
@endsection

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
                FORMULARIO DE REGISTRO
            </span>
            {{-- @can('roles.create') --}}
            <div class="float-right">
                <a href="javascript:void(0)" onclick="history.back()" class="btn btn-warning btn-sm float-right"
                    data-placement="left">
                    <i class="fas fa-arrow-left"></i>
                    Volver
                </a>
            </div>
            {{-- @endcan --}}

        </div>
    </div>
    <div class="card-body">
        {!! Form::open(['route'=>'roles.store']) !!}
        @include('roles.form')
        {!! Form::submit('Crear rol', ['class'=>'btn btn-primary px-5']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection