@extends('layouts.app')

@section('template_title')
    {{ $preciomenu->name ?? 'Show Preciomenu' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Preciomenu</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('preciomenus.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nivelcurso Id:</strong>
                            {{ $preciomenu->nivelcurso_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipomenu Id:</strong>
                            {{ $preciomenu->tipomenu_id }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $preciomenu->precio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
