@extends('layouts.app')

@section('template_title')
    {{ $logsid->name ?? 'Show Logsid' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Logsid</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('logsids.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idgenerado:</strong>
                            {{ $logsid->idgenerado }}
                        </div>
                        <div class="form-group">
                            <strong>Tabla:</strong>
                            {{ $logsid->tabla }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $logsid->observaciones }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
