<div>
    @section('template_title')
    Sucursales |
    @endsection

    <div class="card ">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    SUCURSALES VINCULADAS
                </span>
                {{-- @can('empresas.create') --}}
                <div class="float-right">
                    <button class="btn btn-primary btn-sm float-right" data-placement="left" data-bs-toggle="modal"
                        data-bs-target="#modalNuevo">
                        <i class="fas fa-plus"></i>
                        Nuevo
                    </button>
                </div>
                {{-- @endcan --}}

            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive container-fluid ">
                <form class="form-horizontal mb-3">
                    <div class="form-group row">
                        <div class="col-md-2 text-md-right col-xl-1 text-lg-left">
                            <label for="form-label">Ordenar</label>

                        </div>
                        <div class="col-3 col-sm-2  col-md-2 col-lg-2 col-xl-1">
                            <select class="form-control form-control-sm" wire:model="paginate" style="width: 100%">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="col-2 col-xl-5"></div>
                        <label class="col-md-2 col-xl-1 form-label text-lg-right">Buscar:</label>
                        <div class="col-md-4 ">
                            <input type="search" class="form-control form-control-sm"
                                placeholder="Buscar por nombre o tipo" wire:model="search" style="width: 100%">
                        </div>


                    </div>
                </form>
                <table class="table table-hover  mb-3">

                    <thead class="thead">
                        <tr class="table-primary">
                            <th style="cursor: pointer;" wire:click="order('id')">
                                ID
                                {{-- Sorts --}}
                                @if ($sort == 'id')
                                @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                                @else
                                <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>

                            <th style="cursor: pointer;" wire:click="order('nombre')">
                                NOMBRE
                                {{-- Sorts --}}
                                @if ($sort == 'nombre')
                                @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                                @else
                                <i class="fas fa-sort float-right mt-1"></i>
                                @endif

                            </th>
                            <th style="cursor: pointer;" wire:click="order('tipo')">
                                TIPO
                                {{-- Sorts --}}
                                @if ($sort == 'tipo')
                                @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                                @else
                                <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>

                            <th style="cursor: pointer;" wire:click="order('estado')">
                                Estado
                                {{-- Sorts --}}
                                @if ($sort == 'estado')
                                @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                                @else
                                <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th style="width: 150px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($sucursales->count() > 0)
                        @foreach ($sucursales as $sucursale)
                        <tr>
                            <td>{{ $sucursale->id }}</td>
                            <td>{{ $sucursale->nombre }}</td>
                            <td>{{ $sucursale->tipo }}</td>
                            <td>
                                @if ($sucursale->estado)
                                <span class="badge bg-success">ACTIVO</span>
                                @else
                                <span class="badge bg-danger">INACTIVO</span>
                                @endif
                            </td>
                            <td>

                                {{-- <a class="btn btn-sm btn-primary " href="{{ route('productos.show', $producto->id) }}"
                                    title="Ver"><i class="fa fa-fw fa-eye "></i></a>
                                <a class="btn btn-sm btn-success" href="{{ route('productos.edit', $producto->id) }}"
                                    title="Editar"><i class="fa fa-fw fa-edit "></i></a> --}}
                                {{-- <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                        class="fa fa-fw fa-trash "></i></button> --}}
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center">
                                <span>No se encontraron registros.</span>
                            </td>
                        </tr>
                        @endif

                    </tbody>
                </table>
                <div style="float: right">
                    {{ $sucursales->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore class="modal fade" id="modalNuevo" tabindex="-1" aria-labelledby="modalNuevoLabel"
        aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNuevoLabel">Registro de Sucursal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="resetear"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label for="">NOMBRE</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="text" wire:model.defer="nombre" class="form-control">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="">DIRECCION</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="text" wire:model.defer="direccion" class="form-control">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="">TELEFONO</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="text" wire:model.defer="telefono" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="resetear">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click="save">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    @section('js')
    <script>
        Livewire.on('success', message =>{
            $('#modalNuevo').hide();
            Swal.fire(
            'Excelente!',
            message,
            'success'
            )
        });
    </script>
    @endsection

</div>