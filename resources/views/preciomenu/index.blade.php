@extends('layouts.app')

@section('template_title')
    Precio de Menu | 
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                PRECIOS DE MENU
                            </span>

                             <div class="float-right">
                                <a href="{{ route('precios.create') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                                    <i class="fas fa-plus"></i>
                                    Nuevo
                                </a>
                              </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>NIVEL</th>
										<th>TIPO MENU</th>
										<th>Precio {{Auth::user()->empresa->moneda->abreviatura}}</th>

                                        <th style="width: 200px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($preciomenus as $preciomenu)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $preciomenu->nivelcurso->nombre }}</td>
											<td>{{ $preciomenu->tipomenu->nombre }}</td>
											<td>{{ $preciomenu->precio }}</td>

                                            <td align="right">
                                                <form action="{{ route('precios.destroy',$preciomenu->id) }}" method="POST" class="delete">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('precios.show',$preciomenu->id) }}" title="Ver info"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('precios.edit',$preciomenu->id) }}" title="Editar"><i class="fa fa-fw fa-edit"></i> </a>
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
                {!! $preciomenus->links() !!}
            </div>
        </div>
    </div>
@endsection
