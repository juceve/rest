@extends('layouts.app')

@section('template_title')
    Registro de Empleado | 
@endsection

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-primary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                FORMULARIO DE REGISTRO
                            </span>
                
                            
                            <div class="float-right">
                                <a href="{{route('empleados.index')}}" class="btn btn-warning btn-sm float-right"
                                    data-placement="left">
                                    <i class="fas fa-arrow-left"></i>
                                    Volver
                                </a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('empleados.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('empleado.form')
                            <div class="col-12 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="cbUsuario">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Generar usuario del Sistema</label> 
                                    <small class="text-gray-500">(Email + Password generico: 12345678)</small>
                                </div>
                            </div>
                            <div class="box-footer mt20">
                                <a href="{{route('empleados.index')}}" class="btn btn-secondary mb-2" style="width: 200px"><i class="fas fa-ban"></i> Cancelar</a>
                                <button type="submit" class="btn btn-primary mb-2" style="width: 200px"><i class="fas fa-save"></i> Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
