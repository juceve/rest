@extends('layouts.app')

@section('template_title')
    Info Venta | 
@endsection

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                INFORMACIÓN DE LA VENTA
                            </span>
    
    
                            <div class="float-right">
                                <a href="{{route('ventas.index')}}" class="btn btn-warning btn-sm float-right"
                                    data-placement="left">
                                    <i class="fas fa-arrow-left"></i>
                                    Volver
                                </a>
                            </div>
    
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-2">
                            <strong>ID:</strong>
                            {{ $venta->id }}
                        </div>
                        <div class="form-group mb-2">
                            <strong>Fecha:</strong>
                            {{ $venta->fecha }}
                        </div>
                        <div class="form-group mb-2">
                            <strong>Cliente:</strong>
                            {{ $venta->cliente }}
                        </div>
                        <div class="form-group mb-2">
                            <strong>Estado Pago:</strong>
                            {{ $venta->estadopago->nombre }}
                        </div>
                        <div class="form-group mb-2">
                            <strong>Importe:</strong>
                            {{ $venta->importe }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
