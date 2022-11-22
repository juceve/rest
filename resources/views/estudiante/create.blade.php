@extends('layouts.app')

@section('template_title')
    Create Estudiante
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
                                    REGISTRAR ESTUDIANTE
                            </span>

                             <div class="float-right">
                                <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                                  <i class="fas fa-arrow-left"></i>
                                  Volver
                                </a>
                              </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estudiantes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('estudiante.form')
                            <div class="box-footer mt-3">
                                <a href="{{route('estudiantes.index')}}" class="btn btn-secondary mb-2" style="width: 200px">Cancelar</a>
                                <button type="submit" class="btn btn-primary mb-2" style="width: 200px">REGISTRAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
