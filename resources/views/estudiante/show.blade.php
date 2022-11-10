@extends('layouts.app')

@section('template_title')
    {{ $estudiante->name ?? 'Show Estudiante' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Estudiante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estudiantes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $estudiante->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estudiante->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $estudiante->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $estudiante->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Tutore Id:</strong>
                            {{ $estudiante->tutore_id }}
                        </div>
                        <div class="form-group">
                            <strong>Curso Id:</strong>
                            {{ $estudiante->curso_id }}
                        </div>
                        <div class="form-group">
                            <strong>Verificado:</strong>
                            {{ $estudiante->verificado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
