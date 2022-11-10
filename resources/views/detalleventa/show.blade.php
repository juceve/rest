@extends('layouts.app')

@section('template_title')
    {{ $detalleventa->name ?? 'Show Detalleventa' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Detalleventa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalleventas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $detalleventa->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $detalleventa->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $detalleventa->precio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
