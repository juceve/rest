<div>
    <div class="container-fluid text-md-end text-center mb-3">
        Buscar: <input type="search" wire:model.debounce.500ms='busqueda'>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="thead">
                <tr>
                    <th>ID</th>
                    
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th>Importe</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        
                        <td>{{ $venta->fecha }}</td>
                        <td>{{ $venta->cliente }}</td>
                        <td>{{ $venta->estadopago->nombre }}</td>
                        <td>{{ $venta->importe }}</td>

                        <td>
                            <form action="{{ route('ventas.destroy',$venta->id) }}" method="POST">
                                <a class="btn btn-sm btn-primary " href="{{ route('ventas.show',$venta->id) }}" title="Ver info"><i class="fa fa-fw fa-eye"></i></a>
                                <a class="btn btn-sm btn-success" href="{{ route('ventas.edit',$venta->id) }}" title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit" class="btn btn-danger btn-sm" title="Anular Venta"><i class="fa fa-fw fa-trash"></i></button> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3" style="float: right">
        {!! $ventas->links() !!}
    </div>
</div>
