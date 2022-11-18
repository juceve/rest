@extends('layouts.app')

@section('template_title')
    {{ $asignacione->name ?? 'Show Asignacione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Asignacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('asignaciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $asignacione->empleado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Empresa Id:</strong>
                            {{ $asignacione->empresa_id }}
                        </div>
                        <div class="form-group">
                            <strong>Sucursale Id:</strong>
                            {{ $asignacione->sucursale_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
