@extends('layouts.app')

@section('template_title')
    {{ $pago->name ?? 'Show Pago' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pagos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Recibo:</strong>
                            {{ $pago->recibo }}
                        </div>
                        <div class="form-group">
                            <strong>Tipopago Id:</strong>
                            {{ $pago->tipopago_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipopago:</strong>
                            {{ $pago->tipopago }}
                        </div>
                        <div class="form-group">
                            <strong>Sucursal Id:</strong>
                            {{ $pago->sucursal_id }}
                        </div>
                        <div class="form-group">
                            <strong>Sucursal:</strong>
                            {{ $pago->sucursal }}
                        </div>
                        <div class="form-group">
                            <strong>Importe:</strong>
                            {{ $pago->importe }}
                        </div>
                        <div class="form-group">
                            <strong>Venta Id:</strong>
                            {{ $pago->venta_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $pago->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
