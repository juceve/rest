@extends('layouts.app')

@section('template_title')
Estudiante
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            LISTADO DE ESTUDIANTES
                        </span>
                        @can('estudiantes.create')
                        <div class="float-right">
                            <a href="{{ route('estudiantes.create') }}" class="btn btn-secondary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-plus"></i>
                                Nuevo
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable">
                            <thead class="thead">
                                <tr>
                                    <th>CÓDIGO</th>
                                    <th>NOMBRE</th>
                                    <th>TUTOR</th>
                                    <th>CURSO</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estudiantes as $estudiante)
                                <tr>
                                    <td>{{ $estudiante->codigo }}</td>
                                    <td>{{ $estudiante->nombre }}</td>
                                    <td>{{ $estudiante->tutore->nombre }}</td>
                                    <td>{{ $estudiante->curso->nombre.' - '.$estudiante->curso->nivelcurso->nombre }}
                                    </td>
                                    <td align="right">
                                        <form action="{{ route('estudiantes.destroy',$estudiante->id) }}" method="POST"
                                            class="delete">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('estudiantes.show',$estudiante->id) }}" title="Info"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                            @can('estudiantes.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('vinculosestudiantes',$estudiante->tutore_id) }}"
                                                title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('estudiantes.destroy')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                title="Eliminar de la BD"><i class="fa fa-fw fa-trash"></i></button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $estudiantes->links() !!}
        </div>
    </div>
</div>
@endsection