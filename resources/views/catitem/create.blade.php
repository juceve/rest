@extends('layouts.app')

@section('template_title')
    Registrar Categoria | 
@endsection

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-primary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                REGISTRO DE CATEGORIA
                            </span>

                             <div class="float-right">
                                <a href="{{ route('catitems.index') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                                  <i class="fas fa-arrow-left"></i>
                                  Volver
                                </a>
                              </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('catitems.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('catitem.form')
                            <div class="box-footer mt20">
                                <a href="{{route('catitems.index')}}" class="btn btn-secondary" style="width: 200px">Cancelar</a>
                                <button type="submit" class="btn btn-primary" style="width: 200px">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
