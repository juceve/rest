@extends('layouts.app')

@section('template_title')
    Logsid
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Logsid') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('logsids.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Idgenerado</th>
										<th>Tabla</th>
										<th>Observaciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logsids as $logsid)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $logsid->idgenerado }}</td>
											<td>{{ $logsid->tabla }}</td>
											<td>{{ $logsid->observaciones }}</td>

                                            <td>
                                                <form action="{{ route('logsids.destroy',$logsid->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('logsids.show',$logsid->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('logsids.edit',$logsid->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $logsids->links() !!}
            </div>
        </div>
    </div>
@endsection
