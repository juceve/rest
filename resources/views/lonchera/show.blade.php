@extends('layouts.app')

@section('template_title')
    {{ $lonchera->name ?? 'Show Lonchera' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Lonchera</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('loncheras.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $lonchera->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Estudiante Id:</strong>
                            {{ $lonchera->estudiante_id }}
                        </div>
                        <div class="form-group">
                            <strong>Pago Id:</strong>
                            {{ $lonchera->pago_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
