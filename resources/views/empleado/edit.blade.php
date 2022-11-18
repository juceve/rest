@extends('layouts.app')

@section('template_title')
Edición Empleado |
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
                            FORMULARIO DE EDICIÓN
                        </span>


                        <div class="float-right">
                            <a href="{{route('empleados.index')}}" class="btn btn-warning btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i>
                                Volver
                            </a>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('empleados.update', $empleado->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('empleado.form')
                        @if ($empleado->user_id=="")
                        <div class="col-12 mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                    name="cbUsuario">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Generar usuario del
                                    Sistema</label>
                                <small class="text-gray-500">(Email + Password generico: 12345678)</small>
                            </div>
                        </div>
                        @endif

                        <div class="box-footer mt20">
                            <a href="{{route('empleados.index')}}" class="btn btn-secondary mb-2"
                                style="width: 200px"><i class="fas fa-ban"></i> Cancelar</a>
                            <button type="submit" class="btn btn-primary mb-2" style="width: 200px"><i
                                    class="fas fa-save"></i> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection