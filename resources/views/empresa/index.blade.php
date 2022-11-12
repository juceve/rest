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
                        @can('empresas.create')
                        <div class="float-right">
                            <a href="{{ route('empresas.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <div class="dropdown">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Opciones
                                                <i class="fas fa-caret-right"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-dark"
                                                aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('empresas.show',$empresa->id) }}" title="Ver">
                                                        <i class="fa fa-fw fa-eye"> Ver</i>
                                                    </a>
                                                </li>
                                                <li>
                                                    @can('empresas.edit')
                                                    <a class="dropdown-item"
                                                        href="{{ route('empresas.edit',$empresa->id) }}"
                                                        title="Editar"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @endcan
                                                </li>
                                                <li>
                                                    {{-- @can('sucursales.index') --}}
                                                    <a class="dropdown-item"
                                                        href="{{ route('sucursales',$empresa->id) }}"
                                                        title="Editar"><i class="fas fa-sitemap"></i> Sucursales</a>
                                                    {{-- @endcan --}}
                                                </li>
                                                <form action="{{ route('empresas.destroy',$empresa->id) }}" method="POST"
                                                    class="desactivar">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('empresas.destroy')
                                                        @if ($empresa->estado)
                                                        <button type="submit" class="dropdown-item btn btn-link"><i
                                                                class="fas fa-power-off" title="Desactivar"></i> Desactivar</button>
                                                        @else
                                                        <button type="submit" class="dropdown-item btn btn-link"><i
                                                                class="fas fa-power-off" title="Activar"></i> Activar</button>
                                                        @endif
                                                    @endcan
                                                </form>
                                            </ul>
                                        </div>
                                        
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