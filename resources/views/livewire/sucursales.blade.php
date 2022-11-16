<div>
    @section('template_title')
    Sucursales |
    @endsection

    <div class="card ">
        <div class="card-header bg-primary text-white">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    SUCURSALES VINCULADAS - <strong>{{$empresa->razonsocial}}</strong>
                </span>
                {{-- @can('empresas.create') --}}
                <div class="float-right">
                    @can('sucursales.create')
                    <button class="btn btn-info btn-sm float-right" data-placement="left" data-bs-toggle="modal"
                        data-bs-target="#modalNuevo">
                        <i class="fas fa-plus"></i>
                        Nuevo
                    </button>
                    @endcan
                    <a href="{{ route('empresas.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i>
                        Volver
                    </a>
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

                                @can('sucursales.edit')
                                <button class="btn btn-sm btn-info" title="Editar" onclick="editar({{$sucursale->id}})">
                                    <i class="fa fa-fw fa-edit "></i>
                                </button>
                                @endcan

                                @can('sucursales.disable')
                                @if ($sucursale->estado)
                                <button type="submit" class="btn btn-warning btn-sm disable" title="Desactivar"
                                    onclick="desactivar({{$sucursale->id}})"><i class="fas fa-power-off"></i></button>
                                @else
                                <button type="submit" class="btn btn-success btn-sm disable" title="Activar"
                                    onclick="desactivar({{$sucursale->id}})"><i class="fas fa-power-off"></i></button>
                                @endif
                                @endcan

                                @can('sucursales.destroy')
                                <button type="submit" class="btn btn-danger btn-sm delete" title="Eliminar"
                                    onclick="eliminar({{$sucursale->id}})"><i class="fa fa-fw fa-trash "></i></button>
                                @endcan

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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetear"></button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click="resetear">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click="save">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel"
        aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNuevoLabel">Editar Sucursal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetear"></button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click="resetear">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        wire:click="update">Guardar</button>
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


    function desactivar(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Modificar Estado!',
            text: "Esta seguro de realizar la operación?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, continuar!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('desactivar',id);
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Operación cancelada',
                    'No se modificó ningún registro',
                    'error'
                )
            }
        })
    }

    function eliminar(id) {    
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Elminar de la Base de Datos!',
            text: "Esta seguro de realizar la operación?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, continuar!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('eliminar',id);
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Operación cancelada',
                    'No se modificó ningún registro',
                    'error'
                )
            }
        });
    }

    function editar(id){
        Livewire.emit('editar',id);
        $('#modalEditar').modal('show');
    }
    </script>
    @endsection

</div>