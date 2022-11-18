<div>
    <div class="card">
        <div class="card-header bg-info text-white">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span id="card_title">
                    AREAS DE TRABAJO
                </span>
                @can('empresas.create')
                <div class="float-right">
                    <button class="btn btn-primary btn-sm" data-placement="left" data-bs-toggle="modal"
                        data-bs-target="#modalarea" onclick="store()">
                        <i class="fas fa-plus"></i>
                        Nuevo
                    </button>
                </div>
                @endcan

            </div>
        </div>
        <div class="card-body" style="max-height: 350px; overflow-x: hidden;">
            <div class="table-responsive">
                <table class="table table-stripped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($areas as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>
                                <button class="btn btn-warning btn-sm e" title="Editar" onclick="update()"
                                    wire:click="edit({{ $item->id }})" data-bs-toggle="modal"
                                    data-bs-target="#modalarea">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm text-white" title="Eliminar"
                                    wire:click='destroy({{ $item->id }})'>
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>
        <div class="card-footer"></div>
    </div>
    <!-- Modal -->
    <div wire:ignore class="modal fade" id="modalarea" tabindex="-1" aria-labelledby="modalareaLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalareaLabel">AREA DE TRABAJO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetear"></button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-4 mb-2">
                            <label for="">NOMBRE</label>
                        </div>
                        <div class="col-8 mb-2">
                            <input type="text" class="form-control" wire:model.defer="nombre" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click="resetear">Cerrar</button>
                    <button type="button" class="btn btn-primary store" data-bs-dismiss="modal"
                        wire:click="store">Registrar</button>
                    <button type="button" class="btn btn-primary update" data-bs-dismiss="modal"
                        wire:click="update">Guardar</button>
                </div>

            </div>
        </div>
    </div>
    <script>
        function update(){
        $('.store').addClass('d-none');
        $('.update').removeClass('d-none');
    }
    function store(){
        $('.store').removeClass('d-none');
        $('.update').addClass('d-none');
    }
    </script>
</div>