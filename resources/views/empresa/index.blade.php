@extends('layouts.app')

@section('template_title')
Empresas Registradas | 
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card ">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            LISTADO DE EMPRESAS
                        </span>

                        <div class="float-right">
                            <a href="{{ route('empresas.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-plus"></i>
                                Nuevo
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover dataTable">
                            <thead class="thead">
                                <tr>
                                    <th>ID</th>
                                    <th>RAZON SOCIAL</th>
                                    <th>TELÉFONO</th>
                                    <th>NIT</th>
                                    <th>ESTADO</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empresas as $empresa)
                                <tr>
                                    <td>{{ $empresa->id }}</td>

                                    <td>{{ $empresa->razonsocial }}</td>
                                    <td>{{ $empresa->telefono }}</td>
                                    <td>{{ $empresa->nit }}</td>
                                    <td>
                                        @if ($empresa->estado)
                                        <span class="badge bg-success">ACTIVO</span>
                                        @else
                                        <span class="badge bg-danger">INACTIVO</span>
                                        @endif
                                    </td>

                                    <td class="text-end">
                                        <form action="{{ route('empresas.destroy',$empresa->id) }}" method="POST"
                                            class="desactivar">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('empresas.show',$empresa->id) }}" title="Ver"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('empresas.edit',$empresa->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            @if ($empresa->estado)
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fas fa-power-off" title="Desactivar"></i></button>
                                            @else
                                            <button type="submit" class="btn btn-info btn-sm"><i
                                                    class="fas fa-power-off" title="Activar"></i></button>
                                            @endif

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection