@extends('layouts.app')

@section('template_title')
    Categorias | 
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                LISTADO DE CATEGORIAS DE PRODUCTOS
                            </span>

                             <div class="float-right">
                                <a href="{{ route('catitems.create') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                                  <i class="fas fa-plus"></i>
                                  Nuevo
                                </a>
                              </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dataTable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>

                                        <th style="width: 170px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($catitems as $catitem)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $catitem->nombre }}</td>

                                            <td align="right">
                                                <form action="{{ route('catitems.destroy',$catitem->id) }}" method="POST" class="delete">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('catitems.show',$catitem->id) }}" title="Ver Info"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('catitems.edit',$catitem->id) }}" title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" title="Eliminar de la BD"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $catitems->links() !!}
            </div>
        </div>
    </div>
@endsection
