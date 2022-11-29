@extends('layouts.app')

@section('template_title')
    {{ $menu->name ?? 'Show Menu' }}
@endsection

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                LISTADO DE MENUS REGISTRADOS
                            </span>

                             <div class="float-right">
                                <a href="{{ route('menus.index') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                                  <i class="fas fa-arrow-left"></i>
                                  Volver
                                </a>
                              </div>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group mb-3">
                            <strong>NOMBRE:</strong>
                            {{ $menu->nombre }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>TIPO MENU:</strong>
                            {{ $menu->tipomenu->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
