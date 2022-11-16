@extends('layouts.app')

@section('template_title')
    Editar Empresa | 
@endsection

@section('content')
    <section class="container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-primary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                FORMULARIO DE EDICIÓN DE EMPRESA
                            </span>
                
                            
                            <div class="float-right">
                                <a href="{{route('empresas.index')}}" class="btn btn-warning btn-sm float-right"
                                    data-placement="left">
                                    <i class="fas fa-arrow-left"></i>
                                    Volver
                                </a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('empresas.update', $empresa->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('empresa.form')
                            <div class="box-footer mt20">
                                <a href="{{route('empresas.index')}}" class="btn btn-secondary mb-2" style="width: 200px"><i class="fas fa-ban"></i> Cancelar</a>
                                <button type="submit" class="btn btn-primary mb-2" style="width: 200px"><i class="fas fa-save"></i> Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
