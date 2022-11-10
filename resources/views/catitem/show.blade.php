@extends('layouts.app')

@section('template_title')
    {{ $catitem->name ?? 'Show Catitem' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Catitem</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('catitems.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $catitem->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
