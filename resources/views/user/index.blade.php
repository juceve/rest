@extends('layouts.app')

@section('template_title')
Usuarios Registrados | 
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card ">
                <div class="card-header bg-primary text-white">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            LISTADO DE USUARIOS
                        </span>

                        @can('users.create')
                        <div class="float-right">
                            <a href="#" class="btn btn-primary btn-sm float-right"
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
                                    <th>NOMBRE</th>
                                    <th>EMAIL</th>
                                    <th>ROL</th>
                                    <th>ESTADO</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>

                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td></td>
                                    <td>
                                        @if ($usuario->estado)
                                        <span class="badge bg-success">ACTIVO</span>
                                        @else
                                        <span class="badge bg-danger">INACTIVO</span>
                                        @endif
                                    </td>

                                    <td class="text-end">
                                        <form action="" method="POST"
                                            class="desactivar">
                                            
                                            @can('users.edit')
                                            <a class="btn btn-sm btn-success"
                                            href="{{ route('users.edit',$usuario->id) }}" title="Editar"><i
                                                class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('users.destroy')
                                            @if ($usuario->estado)
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fas fa-power-off" title="Desactivar"></i></button>
                                            @else
                                            <button type="submit" class="btn btn-info btn-sm"><i
                                                    class="fas fa-power-off" title="Activar"></i></button>
                                            @endif
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
        </div>
    </div>
</div>
@endsection