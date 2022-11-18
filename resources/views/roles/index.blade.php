@extends('layouts.app')

@section('template_title')
ROLES
@endsection

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
                LISTADO DE ROLES
            </span>
            @can('roles.create')
            <div class="float-right">
                <a href="{{ route('roles.create') }}" class="btn btn-warning btn-sm float-right"
                    data-placement="left">
                    <i class="fas fa-plus"></i>
                    Nuevo
                </a>
            </div>
            @endcan

        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-hover dataTable">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        ROLE
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=0;
                @endphp
                @foreach ($roles as $role)
                <tr>
                    <td>
                        {{++$i}}
                    </td>
                    <td>
                        {{$role->name}}
                    </td>
                    <td class="text-end">
                        <form action="{{route('roles.destroy', $role)}}" method="POST" class="delete">
                            @csrf
                            @method('DELETE')
                            @can('roles.edit')
                            <a href="{{ route('roles.edit',$role) }}" class="btn btn-primary btn-sm">Editar</a>
                            @endcan
                            @can('roles.destroy')
                               <button type="submit" class="btn btn-danger btn-sm">Eliminar</button> 
                            @endcan
                            
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection