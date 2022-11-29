<div>
    @section('css')
    <style>
        .dataTables_length {
            display: none;
        }

        .dataTables_info {
            display: none;
        }

        .DataTables_Table_0_filter {
            float: right;
        }
    </style>
    @endsection
    @section('template_title')
    Elaborar Menu |
    @endsection

    <div class="card">
        <div class="card-header bg-primary text-white">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    ELABORACIÓN DE MENÚ
                </span>
                <div class="float-right">
                    <a href="{{route('menus.index')}}" class="btn btn-warning btn-sm float-right" data-placement="left">
                        <i class="fas fa-arrow-left"></i>
                        Volver
                    </a>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-4 mb-2">

                    <input type="text" class="form-control {{($errors->has('tipomenu_id') ? ' is-invalid' : '')}}" wire:model="nombre" placeholder="Nombre del Menu">
                    @error('nombre')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12 col-md-4 mb-2">

                    {!! Form::select('tipomenu_id', $tipos, null, ['class' => 'form-select' .
                    ($errors->has('tipomenu_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un tipo de Menu',
                    'wire:model'=>'tipomenu_id']) !!}
                    @error('tipomenu_id')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <input type="hidden" wire:model="descripcion">
                <div class="col-12 col-md-4 mb-2 d-grid gap-2" style="vertical-align: bottom">
                    @if ($menu_id == 0)
                        <button class="btn btn-success text-white" wire:click="save"><i class="fas fa-save"></i> Registrar
                        Menu</button>
                    @else
                        <button class="btn btn-info text-white" wire:click="update"><i class="fas fa-save"></i> Editar
                        Menu</button>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2 gx-1">
        <div class="col-12 col-md-6 mb-2">
            <div class="card" wire:ignore>
                <div class="card-header " style="background-color: rgb(155, 191, 238)">
                    <span>Elija los Productos</span>
                </div>
                <div class="card-body">
                    <table class="table table-sm" id="dataTable">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>CATEGORIA</th>
                                <th width="40"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{$item->nombre}}</td>
                                <td>{{$item->catitem->nombre}}</td>
                                <td align="right" width="40"><button class="btn btn-sm btn-outline-success"
                                        title="Agregar al Menu" wire:click="agregar({{$item->id}})"><i
                                            class="fas fa-arrow-right"></i></button></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-2">
            <div class="card">
                <div class="card-header text-center" style="background-color: rgb(159, 218, 195)">
                    <span>Lista de Productos del Menu</span>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>CATEGORIA</th>
                                    <th>PRODUCTO</th>
                                    <th width='10'></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!is_null($itemsMenu))

                                @php $i=0; @endphp
                                @foreach ($itemsMenu as $item)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>
                                        {{$item['categoria']}}
                                    </td>
                                    <td>
                                        {{$item['producto']}}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-link text-danger" title="Eliminar"
                                            wire:click="eliminar({{$i}})"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('js')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"                
                },
                "pageLength": 5,
            });
           });
           
           Livewire.on('warning',message=>{
                Swal.fire(
                    'Alerta',
                    message,
                    'warning'
                )
           });

           Livewire.on('error',message=>{
                Swal.fire(
                    'Error',
                    message,
                    'error'
                )
           });
    </script>
    @endsection
</div>