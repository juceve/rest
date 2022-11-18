@extends('layouts.app')

@section('template_title')
    {{ $cargoempleado->name ?? 'Show Cargoempleado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cargoempleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cargoempleados.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cargoempleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Area Id:</strong>
                            {{ $cargoempleado->area_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
