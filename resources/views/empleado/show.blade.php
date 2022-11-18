@extends('layouts.app')

@section('template_title')
{{ $empleado->nombre ?? 'Show Empleado' }} |
@endsection

@section('content')
<section class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            INFORMACIÓN DE EMPLEADO
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
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                {{ $empleado->nombre }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>Cédula:</strong>
                                {{ $empleado->cedula }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>Dirección:</strong>
                                {{ $empleado->direccion }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>Teléfono:</strong>
                                {{ $empleado->telefono }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>Fecha Nacimiento:</strong>
                                {{ $empleado->fecnacimiento }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {{ $empleado->email }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>Cargo:</strong>
                                {{ $empleado->cargoempleado->nombre }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>Estado:</strong>
                                @if ($empleado->estado)
                                <span class="badge bg-success">ACTIVO</span>
                                @else
                                <span class="badge bg-danger">INACTIVO</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>Foto de Perfil:</strong><br>
                                <img src="{{Storage::url($empleado->avatar)}}" width="100px" class="img-thumbnail" style="float: left">
                            </div>
                        </div>
                    </div>










                </div>
            </div>
        </div>
    </div>
</section>
@endsection