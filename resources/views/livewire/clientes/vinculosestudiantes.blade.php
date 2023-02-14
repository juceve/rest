<div>
    @section('template_title')
    Vinculos |
    @endsection

    <div class="card">
        <div class="card-header bg-primary text-white">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span id="card_title">
                    Estudiantes vinculados
                </span>
                {{-- @can('estudiante.create') --}}
                <div class="float-right">
                    <button class="btn btn-info btn-sm" data-placement="left" data-bs-toggle="modal"
                        data-bs-target="#modalViculo" onclick="store()">
                        <i class="fas fa-plus"></i>
                        Nuevo
                    </button>

                    <a href="{{route('tutores')}}" class="btn btn-warning btn-sm float-right"
                                    data-placement="left">
                                    <i class="fas fa-arrow-left"></i>
                                    Volver
                                </a>
                </div>
                {{-- @endcan --}}
            </div>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <span><strong>TUTOR: </strong> {{$tutor->nombre}}</span>
            </div>
            <div class="table-responsive">
                <table class="table table-stripped ">
                    <thead >
                        <tr class="table-primary">
                            <th>
                                CODIGO
                            </th>
                            <th>
                                NOMBRE
                            </th>
                            <th>
                                CEDULA
                            </th>
                            <th>
                                CURSO
                            </th>
                            <th style="width: 150px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($estudiantes->count()>0)
                        @foreach ($estudiantes as $item)
                        <tr>
                            <td>{{$item->codigo}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->cedula}}</td>
                            <td>{{$item->curso->nombre . ' - ' . $item->curso->nivelcurso->nombre }}</td>
                            <td align="right">
                                {{-- <a href="{{route('vinculosestudiantes',$item->id)}}"
                                    class="btn btn-primary btn-sm e" title="Vinculos">
                                    <i class="fas fa-sitemap"></i>
                                </a> --}}
                                {{-- @can('tutores.edit') --}}
                                <button class="btn btn-warning btn-sm e" title="Editar" onclick="update()"
                                    wire:click="edit({{ $item->id }})" data-bs-toggle="modal"
                                    data-bs-target="#modalViculo">
                                    <i class="fas fa-edit"></i>
                                </button>
                                {{-- @endcan --}}
                                {{-- @can('tutores.destroy') --}}
                                <button class="btn btn-danger btn-sm text-white" title="Eliminar"
                                    onclick="eliminar({{$item->id}})">
                                    <i class="fas fa-trash"></i>
                                </button>
                                {{-- @endcan --}}



                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" align="center"><span>No se encontraron registros</span></td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
            <div style="float: right" class="mt-3">
                {{ $estudiantes->links() }}
            </div>
            
        </div>
        {{-- <div class="card-footer"></div> --}}
    </div>
    <!-- Modal -->
    <div wire:ignore class="modal fade" id="modalViculo" tabindex="-1" aria-labelledby="modalViculoLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEstadoPagoLabel">FORMULARIO DE REGISTRO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetear"></button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-4 mb-2">
                            <label for="">NOMBRE</label>
                        </div>
                        <div class="col-8 mb-2">
                            <input type="text" class="form-control" wire:model.defer="nombre">
                        </div>
                        <div class="col-4 mb-2">
                            <label for="">CEDULA</label>
                        </div>
                        <div class="col-8 mb-2">
                            <input type="text" class="form-control" wire:model.defer="cedula">
                        </div>
                        <div class="col-4 mb-2">
                            <label for="">CORREO</label>
                        </div>
                        <div class="col-8 mb-2">
                            <input type="text" class="form-control" wire:model.defer="correo">
                        </div>
                        <div class="col-4 mb-2">
                            <label for="">TELEFONO</label>
                        </div>
                        <div class="col-8 mb-2">
                            <input type="text" class="form-control" wire:model.defer="telefono">
                        </div>
                        <div class="col-4 mb-2">
                            <label for="">CURSO</label>
                        </div>
                        <div class="col-8 mb-2">
                            <select name="curso_id" id="curso_id" class="form-select" wire:model="curso_id">
                                <option value="">Seleccione un curso</option>
                                @foreach ($cursos as $item)
                                <option value="{{$item->id}}">{{$item->nombre." - ".$item->nivelcurso->nombre}}</option>    
                                @endforeach
                                
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click="resetear">Cerrar</button>
                    <button type="button" class="btn btn-primary store" wire:click="store"
                        data-bs-dismiss="modal">Registrar</button>
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

    function eliminar(id){
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Eliminar estudiante!',
        text: "Esta seguro de realizar la operación?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, continuar!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            @this.emit('destroy',id);
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
    </script>

    @section('js')
    <script>
        Livewire.on('alert', message =>{
        
        Swal.fire(
                'Excelente!',
                message,
                'success'
            );
    });
    </script>
    @endsection
</div>