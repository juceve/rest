@extends('layouts.app')

@section('template_title')
    {{ $tipopago->name ?? 'Show Tipopago' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tipopago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipopagos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tipopago->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Abreviatura:</strong>
                            {{ $tipopago->abreviatura }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
