@extends('layouts.app')

@section('template_title')
    {{ $tutore->name ?? 'Show Tutore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tutore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tutores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tutore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $tutore->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $tutore->telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
