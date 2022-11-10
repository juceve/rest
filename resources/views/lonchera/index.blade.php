@extends('layouts.app')

@section('template_title')
    Lonchera
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lonchera') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('loncheras.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Fecha</th>
										<th>Estudiante Id</th>
										<th>Pago Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loncheras as $lonchera)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $lonchera->fecha }}</td>
											<td>{{ $lonchera->estudiante_id }}</td>
											<td>{{ $lonchera->pago_id }}</td>

                                            <td>
                                                <form action="{{ route('loncheras.destroy',$lonchera->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('loncheras.show',$lonchera->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('loncheras.edit',$lonchera->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $loncheras->links() !!}
            </div>
        </div>
    </div>
@endsection
