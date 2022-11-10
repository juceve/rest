@extends('layouts.app')

@section('template_title')
    {{ $estadopago->name ?? 'Show Estadopago' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Estadopago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estadopagos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estadopago->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Abreviatura:</strong>
                            {{ $estadopago->abreviatura }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
