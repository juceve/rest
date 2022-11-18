@extends('layouts.app')

@section('template_title')
    Asignacione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Asignacione') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('asignaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Empleado Id</th>
										<th>Empresa Id</th>
										<th>Sucursale Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asignaciones as $asignacione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $asignacione->empleado_id }}</td>
											<td>{{ $asignacione->empresa_id }}</td>
											<td>{{ $asignacione->sucursale_id }}</td>

                                            <td>
                                                <form action="{{ route('asignaciones.destroy',$asignacione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('asignaciones.show',$asignacione->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('asignaciones.edit',$asignacione->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $asignaciones->links() !!}
            </div>
        </div>
    </div>
@endsection
