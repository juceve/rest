<div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            PEDIDOS CON PAGOS PENDIENTES
        </div>
        <div class="card-body ">
                <label for="">Filtrar por tipo de pago: </label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model="filtroBusqueda" id="rTodos" value="">
                    <label class="form-check-label" for="rTodos">Todos</label>
                </div>
                @if ($tipopagos->count() > 0)
                @foreach ($tipopagos as $tipo)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model="filtroBusqueda" id="r{{$tipo->id}}"
                        value="{{$tipo->nombre}}" title="{{$tipo->nombre}}">
                    <label class="form-check-label" for="r{{$tipo->id}}" title="{{$tipo->nombre}}">
                        <div class="d-none d-md-block">
                            {{$tipo->nombre}}
                        </div>
                        <div class="d-block d-md-none">
                            {{$tipo->abreviatura}}
                        </div>

                    </label>
                </div>
                @endforeach

                @endif
            <hr>
            <div class="row mb-2">
                <div class="col-12 col-md-1">
                    <label class="mt-2">Buscar:</label>
                </div>
                <div class="col-12 col-md-4">
                    <input type="search" wire:model="busqueda" class="form-control" placeholder="Nombre del cliente">
                </div>

            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead">
                        <tr>
                            <th>No</th>

                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Tipo Pago</th>
                            <th>Precio Bs.</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=0;
                        @endphp
                        @if ($ventas->count() > 0)
                        @foreach ($ventas as $venta)
                        <tr>
                            <td>{{ ++$i }}</td>

                            <td>{{ $venta->fecha }}</td>
                            <td>{{ $venta->cliente }}</td>
                            <td>{{ $venta->tipopago }}</td>
                            <td><strong>{{ $venta->importe }}</strong> </td>

                            <td>
                                <a class="btn btn-sm btn-info" style="font-size: 11px"
                                    href="{{ route('appedido',$venta->id) }}"><i class="fa fa-fw fa-eye"></i>
                                    Verificar</a>

                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center" colspan="6">
                                <span >No se encontraron registros!</span>
                            </td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $ventas->links() }}
            </div>
        </div>
    </div>
</div>