@extends('layouts.app')

@section('template_title')
    Listado de Menu | 
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                LISTADO DE MENUS REGISTRADOS
                            </span>

                             <div class="float-right">
                                <a href="{{ route('elaborarmenu',0) }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
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
										<th>NOMBRE</th>
										<th>TIPO MENU</th>
                                        <th width="30"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $menu->nombre }}</td>
											<td>{{ $menu->tipomenu->nombre }}</td>
                                            <td align="right">
                                                <form action="{{ route('menus.destroy',$menu->id) }}" method="POST" class="delete">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('menus.show',$menu->id) }}" title="Ver Info"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('elaborarmenu',$menu->id) }}" title="Editar"><i class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" title="Eliminar de la BD"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $menus->links() !!}
            </div>
        </div>
    </div>
@endsection
