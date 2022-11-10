@extends('layouts.app')

@section('template_title')
    {{ $detallelonchera->name ?? 'Show Detallelonchera' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Detallelonchera</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalleloncheras.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Item Id:</strong>
                            {{ $detallelonchera->item_id }}
                        </div>
                        <div class="form-group">
                            <strong>Lonchera Id:</strong>
                            {{ $detallelonchera->lonchera_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
