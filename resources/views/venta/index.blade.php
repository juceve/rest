@extends('layouts.app')

@section('template_title')
    Venta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                LISTADO DE VENTAS
                            </span>

                             <div class="float-right">
                                {{-- <a href="{{ route('ventas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a> --}}
                              </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        @livewire('ventas.listado')
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
