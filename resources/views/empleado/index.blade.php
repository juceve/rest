@extends('layouts.app')

@section('template_title')
Empleado
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Empleado') }}
                        </span>

                        <div class="float-right">
                            @can('empleados.create')
                            <a href="{{ route('empleados.create') }}" class="btn btn-warning btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-plus"></i>
                                Nuevo
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>NOMBRE</th>
                                    <th>AREA</th>
                                    <th>CARGO</th>
                                    <th>ESTADO</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empleados as $empleado)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $empleado->nombre }}</td>
                                    <td>{{ $empleado->cargoempleado->area->nombre }}</td>
                                    <td>{{ $empleado->cargoempleado->nombre }}</td>
                                    <td>
                                        @if ($empleado->estado)
                                        <span class="badge bg-success">ACTIVO</span>
                                        @else
                                        <span class="badge bg-danger">INACTIVO</span>
                                        @endif
                                    </td>

                                    <td>


                                        {{-- <form action="{{ route('empleados.disable',$empleado->id) }}" method="POST"
                                            class="desactivar">
                                            @csrf
                                            @if ($empleado->estado)
                                            <button type="submit" class=" btn btn-danger btn-sm"><i
                                                    class="fas fa-power-off" title="Desactivar"></i> </button>
                                            @else
                                            <button type="submit" class="btn btn-info btn-sm"><i
                                                    class="fas fa-power-off" title="Activar"></i> </button>
                                            @endif
                                        </form> --}}


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
                                                        href="{{ route('empleados.show',$empleado->id) }}" title="Ver">
                                                        <i class="fa fa-fw fa-eye"> Ver</i>
                                                    </a>
                                                </li>
                                                <li>
                                                    @can('empleados.edit')
                                                    <a class="dropdown-item"
                                                        href="{{ route('empleados.edit',$empleado->id) }}"
                                                        title="Editar"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @endcan
                                                </li>
                                                <form action="{{ route('empleados.disable',$empleado->id) }}"
                                                    method="POST" class="desactivar">
                                                    @csrf
                                                    @can('empleados.disable')
                                                    @if ($empleado->estado)
                                                    <button type="submit" class="dropdown-item btn btn-link"><i
                                                            class="fas fa-power-off" title="Desactivar"></i>
                                                        Desactivar</button>
                                                    @else
                                                    <button type="submit" class="dropdown-item btn btn-link"><i
                                                            class="fas fa-power-off" title="Activar"></i>
                                                        Activar</button>
                                                    @endif
                                                    @endcan
                                                </form>
                                                <form action="{{ route('empleados.destroy',$empleado->id) }}"
                                                    method="POST" class="delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('empleados.destroy')
                                                    <button type="submit" class="dropdown-item btn btn-link"
                                                        title="Eliminar de BD">
                                                        <i class="fas fa-trash"></i> Eliminar de BD
                                                    </button>
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