@extends('layouts.app')

@section('template_title')
    {{ $detalleevento->name ?? 'Show Detalleevento' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Detalleevento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalleeventos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Evento Id:</strong>
                            {{ $detalleevento->evento_id }}
                        </div>
                        <div class="form-group">
                            <strong>Menu Id:</strong>
                            {{ $detalleevento->menu_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
