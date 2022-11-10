@extends('layouts.app')

@section('template_title')
Datos Empresa |
@endsection

@section('content')
<section class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-7">
                            <span class="card-title">Datos de la Empresa</span>
                        </div>
                        <div class="col-5 text-end">
                            <button class="btn btn-primary btn-sm" onclick="history.back()"><i
                                    class="fas fa-arrow-left"></i> Volver</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">


                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <strong>Razon social:</strong>
                                {{ $empresa->razonsocial }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            
                            <span class="align-middle"><img src="{{Storage::url($empresa->avatar)}}" alt="" height="35px"></span>
                            
                        </div>
                        <hr>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <strong>Dirección:</strong>
                                {{ $empresa->direccion }}
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <strong>Teléfono:</strong>
                                {{ $empresa->telefono }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <strong>Email:</strong>
                                {{ $empresa->email }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <strong>NIT:</strong>
                                {{ $empresa->nit }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <strong>Responsable:</strong>
                                {{ $empresa->responsable }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <strong>Telefono Resp.:</strong>
                                {{ $empresa->telefono_responsable }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <strong>Estado:</strong>
                                @if ($empresa->estado)
                                        <span class="badge bg-success">ACTIVO</span>
                                        @else
                                        <span class="badge bg-danger">INACTIVO</span>
                                        @endif
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>
</section>
@endsection