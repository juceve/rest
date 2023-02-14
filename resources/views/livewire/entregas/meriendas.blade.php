<div>
    {{-- BOTONERAS --}}
    <h3 class="text-center mb-4 text-success">ENTREGA DE PRODUCTOS</h3>
    <div class="mb-2">
        <div class="d-block d-md-none">
            <div class="row">
                <div class="col-4 d-grid gap-2 mb-2">
                    <button class="btn btn-info  text-center " wire:click='mostrarIndividual'>
                        <i class="fas fa-concierge-bell"></i> <br> INDIVIDUAL
                    </button>
                </div>
                <div class="col-4 d-grid gap-2 mb-2" wire:click='mostrarCurso'>
                    <button class="btn btn-info  text-white text-center">
                        <i class="fas fa-clipboard-list"></i> <br> CURSO
                    </button>
                </div>
                <div class="col-4 d-grid gap-2 mb-2" wire:click='mostrarVentas'>
                    <button class="btn btn-info   text-center">
                        <i class="fas fa-cash-register"></i> <br> VENTAS
                    </button>
                </div>
            </div>

        </div>
        <div class="d-none d-md-block">
            <div class="row">
                <div class="col-md-4 d-grid gap-2 mb-2" style="height: 90px">
                    <button class="btn btn-info fs-4 text-center " style="height: 100%" wire:click='mostrarIndividual'>
                        <i class="fas fa-concierge-bell"></i> INDIVIDUAL
                    </button>
                </div>
                <div class="col-md-4 d-grid gap-2 mb-2" style="height: 90px" wire:click='mostrarCurso'>
                    <button class="btn btn-info fs-4 text-white text-center" style="height: 100%">
                        <i class="fas fa-clipboard-list"></i> POR CURSO
                    </button>
                </div>
                <div class="col-md-4 d-grid gap-2 mb-2" style="height: 90px" wire:click='mostrarVentas'>
                    <button class="btn btn-info fs-4  text-center" style="height: 100%">
                        <i class="fas fa-cash-register"></i> VENTAS
                    </button>
                </div>
            </div>

        </div>
    </div>
    <div class="row {{$dnIndividual}}">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <label for="">CODIGO ESTUDIANTE</label>
                    <div class="input-group mb-3">
                        <input type="search" class="form-control fs-6" placeholder="Ingrese el código"
                            id="busquedaCodigo" aria-label="Ingrese el código" aria-describedby="button-addon2"
                            wire:model.debounce.500ms="busquedaCodigo" wire:keydown.enter="buscarEstudiante">
                        <button class="btn btn-info " type="button" id="button-addon2" wire:click="buscarEstudiante"
                            title="Buscar"><i class="fas fa-search"></i> <small
                                class="d-none d-lg-block">Buscar</small></button>

                    </div>
                    <div class="form-group d-grid gap-2">
                        <button class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#mdBusquedaAvanzada">
                            <i class="fas fa-search"></i> Busqueda avanzada
                        </button>
                    </div>
                    <div class="table-responsive {{$dnResultado}}">
                        @if (!is_null($estudiante))
                        <hr>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td colspan="2"><strong>{{$estudiante->nombre}}</strong></td>
                                </tr>
                                <tr>
                                    <td><small>CURSO:</small></td>
                                    <td><small>{{$estudiante->curso->nombre}}</small></td>
                                </tr>
                                <tr>
                                    <td><small>NIVEL:</small></td>
                                    <td><small>{{$estudiante->curso->nivelcurso->nombre}}</small></td>
                                </tr>
                            </tbody>
                        </table>

                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if ($dnIndividual == "")
        <div class="col-12 col-md-8">
            <div class="card ">
                <div class="card-header text-center text-white bg-primary">
                    <span class=" fs-5">ENTREGAS</span>
                </div>

                <div class="card-body">
                    @if (!is_null($detalles))
                    @foreach ($detalles as $detalle)

                    @if ($detalle->tipomenu_id == 1)
                    @if ($detalle->entregado == 0)
                    <div class="card mb-3 ">
                        <div class="row g-0" style="background-color: #eef8ec">
                            <div class="col-md-3 rounded-start"
                                style="background-image: url({{Storage::url('img/entregas/merienda.jpg')}});height: 100; "">
                                                
                                            </div>
                                            <div class=" col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">MERIENDA</h5>
                                    {{$detalle->nombre}}
                                    <br>
                                    <small>
                                        {{$detalle->descripcion}}
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-success text-white" style="height: 100%; width: 100% "
                                    onclick="despachar({{$detalle->id}})">
                                    ENTREGAR <br> <i class="fas fa-arrow-alt-circle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="container-fluid mb-3">
                        <label class="form-control text-success fs-5"><i class="fas fa-clipboard-check"></i> MERIENDA
                            ENTREGADA</label>
                        <hr>
                    </div>
                    @endif


                    @else
                    @if ($detalle->entregado == 0)
                    <div class="card mb-3 ">
                        <div class="row g-0" style="background-color: #ecf6f8">
                            <div class="col-md-3 rounded-start"
                                style="background-image: url({{Storage::url('img/entregas/almuerzo.jpg')}});height: 100; ">

                            </div>
                            <div class=" col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">ALMUERZO</h5>

                                    {{$detalle->nombre}}
                                    <br>
                                    <small>
                                        {{$detalle->descripcion}}
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                @php
                                $dnone = " d-none";
                                if (strtotime(date('Y-m-d H:i:s')) > strtotime(date('Y-m-d').' 12:00:00')) {
                                $dnone = "";
                                }
                                @endphp

                                @if ($dnone == "")
                                <button class="btn btn-info " style="height: 100%; width: 100% "
                                    onclick="despachar({{$detalle->id}})">ENTREGAR <br> <i
                                        class="fas fa-arrow-alt-circle-right"></i></button>
                                @else
                                <table style="height: 100%;">
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center bg-gray-200 text-warning">FUERA DE
                                                HORARIO</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endif

                            </div>
                        </div>
                    </div>
                    @else
                    <div class="container-fluid mb-3">
                        <label class="form-control text-info fs-5"><i class="fas fa-clipboard-check"></i> ALMUERZO
                            ENTREGADO</label>
                    </div>

                    @endif

                    @endif

                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        @endif




    </div>

    <div class="row {{$dnCurso}}">
        <div class="container-fluid">
            <div class="card" style="background-color: #fcfcfc">
                <div class="card-header bg-success text-white text-center">
                    <span class="fs-5">ENTREGAS POR CURSO</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-5 col-lg-4 mb-2">
                            <div class="form-group">
                                <label for="">Curso: </label>
                                <select class="form-select" wire:model="selCurso">
                                    <option selected>Seleccionar...</option>
                                    @if ($cursos->count() > 0)
                                    @foreach ($cursos as $curso)
                                    <option value="{{$curso->id}}">{{$curso->nivel .' - '.$curso->curso}}</option>
                                    @endforeach
                                    @endif
                                </select>

                            </div>
                        </div>
                        <div class="col-12 col-md-5 col-lg-4 mb-2">

                            <div class="form-group">
                                <label for="">Tipo de Menu</label>
                                <select class="form-select" wire:model="tipomenu_id">
                                    <option selected>Seleccionar...</option>
                                    @if ($cursos->count() > 0)
                                    @foreach ($tipos as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                    @endforeach
                                    @endif
                                </select>

                            </div>
                        </div>
                        <div class="col-12 col-md-2 col-lg-4">
                            <div class="form-group d-grid gap-2">
                                <br class="d-none d-md-block">
                                <button class="btn btn-info " wire:click="buscarXCurso"><i class="fas fa-search"></i>
                                    Buscar</button>
                            </div>
                        </div>
                    </div>
                    @if (!is_null($alumnos) && $alumnos->count() )
                    <hr>
                    <div class="mt-3 text-center">

                        <div class="row ">
                            <div class="col-12 mt-3" style="height: 50px;">
                                <h3 class="text-info align-middle"><strong>CURSO : 1A PRIMARIA</strong></h3>
                            </div>
                            <div class="col-6 border" style="height: 30px;">
                                <strong>MENU:</strong> MERIENDA 1
                            </div>
                            <div class="col-6 border" style="height: 30px;">
                                <strong>CANT.:</strong> {{$alumnos->count()}}
                            </div>

                        </div>
                    </div>

                    @if (!is_null($alumnos))
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>NRO</th>
                                <th>ALUMNO</th>
                                <th>CODIGO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($alumnos as $alumno)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$alumno->estudiante}}</td>
                                <td>{{$alumno->codigo}}</td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach

                        </tbody>
                    </table>

                    @endif

                    <div class="row mt-3">
                        <div class="col-6 d-grid gap-2 mb-3" style="height: 50px;">
                            <button class="btn btn-success fs-4" onclick="despacharCurso()"
                                wire:loading.attr="disabled">DESPACHAR</button>
                        </div>
                        <div class="col-6 d-grid gap-2 mb-3" style="height: 50px;">
                            <button class="btn btn-primary fs-4" wire:click="cancelarCurso">CANCELAR</button>
                        </div>
                    </div>

                    @endif
                </div>
            </div>


        </div>
    </div>

    <div class="row {{$dnVentas}}">

        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <label for="">CODIGO ESTUDIANTE</label>
                    <div class="input-group mb-3">
                        <input type="search" class="form-control fs-6" placeholder="Ingrese el código"
                            id="busquedaCodigo" aria-label="Ingrese el código" aria-describedby="button-addon2"
                            wire:model.debounce.500ms="busquedaCodigo" wire:keydown.enter="buscarEstudiante">
                        <button class="btn btn-info " type="button" id="button-addon2" wire:click="buscarEstudiante"
                            title="Buscar"><i class="fas fa-search"></i> <small
                                class="d-none d-lg-block">Buscar</small></button>

                    </div>
                    <div class="form-group d-grid gap-2">
                        <button class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#mdBusquedaAvanzada">
                            <i class="fas fa-search"></i> Busqueda avanzada
                        </button>
                    </div>
                    <div class="table-responsive {{$dnResultado}}">
                        @if (!is_null($estudiante))
                        <hr>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td colspan="2"><strong>{{$estudiante->nombre}}</strong></td>
                                </tr>
                                <tr>
                                    <td><small>CURSO:</small></td>
                                    <td><small>{{$estudiante->curso->nombre}}</small></td>
                                </tr>
                                <tr>
                                    <td><small>NIVEL:</small></td>
                                    <td><small>{{$estudiante->curso->nivelcurso->nombre}}</small></td>
                                </tr>
                            </tbody>
                        </table>

                        @endif
                    </div>
                    <hr>
                    <h5 class="text-success">FORMA DE PAGO</h5>
                    @foreach ($tipopagos as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="formapagos" id="rb{{$item->id}}"
                            value="{{$item->id}}" wire:model='tipopago'>
                        <label class="form-check-label" for="rb{{$item->id}}">
                            {{$item->nombre}}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header text-center bg-secondary">
                    <span class=" fs-5"><strong>COMPRAR PRODUCTOS PARA HOY</strong> </span>
                </div>
                <div class="card-body">
                    <div class="container">


                        @if ($detalleDia->count() > 0)
                        @foreach ($detalleDia as $detalle)
                        @if ($detalle->tipo == "MERIENDA")
                        <div class="card mb-3 ">
                            <div class="row g-0" style="background-color: #eef8ec">
                                <div class="col-md-3 rounded-start"
                                    style="background-image: url({{Storage::url('img/entregas/merienda.jpg')}});height: 100; ">

                                </div>
                                <div class=" col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">MERIENDA</h5>
                                        {{$detalle->menu->nombre}}
                                        <br>
                                        <small>
                                            {{$detalle->menu->descripcion}}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-success text-white" style="height: 100%; width: 100% "
                                        onclick="comprar({{$detalle->menu_id}},{{$detalle->menu->tipomenu_id}})"
                                        wire:loading.attr="disabled">
                                        COMPRA <br> <i class="fas fa-cash-register"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($detalle->tipo == "ALMUERZO")
                        <div class="card mb-3 ">
                            <div class="row g-0" style="background-color: #eef8ec">
                                <div class="col-md-3 rounded-start"
                                    style="background-image: url({{Storage::url('img/entregas/almuerzo.jpg')}});height: 100; ">

                                </div>
                                <div class=" col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">ALMUERZO</h5>
                                        {{$detalle->menu->nombre}}
                                        <br>
                                        <small>
                                            {{$detalle->menu->descripcion}}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-success text-white" style="height: 100%; width: 100% "
                                        onclick="comprar({{$detalle->menu_id}},{{$detalle->menu->tipomenu_id}})"
                                        wire:loading.attr="disabled">
                                        COMPRA <br> <i class="fas fa-cash-register"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif


                    </div>


                </div>
            </div>
        </div>

    </div>

    <!-- Modal Busqueda Avanzada-->
    <div class="modal fade" id="mdBusquedaAvanzada" tabindex="-1" aria-labelledby="mdBusquedaAvanzadaLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdBusquedaAvanzadaLabel">Busqueda Avanza de Estudiantes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire('entregas.busquedaavanzada')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    $(document).ready(function () {
            $('#busquedaCodigo').focus();
        });

    function despachar(id){
        Swal.fire({
            title: 'ENTREGAR PEDIDO',
            text: "Esta seguro de entregar el pedido al cliente?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'SI, entregar',
            cancelButtonText: 'NO, cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('despachar',id);
            }
            })
        }

        function despacharCurso(){
        Swal.fire({
            title: 'ENTREGAR PEDIDO',
            text: "Esta seguro de entregar el pedido al curso?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'SI, entregar',
            cancelButtonText: 'NO, cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('despacharCurso');
            }
            });
        }
        
        Livewire.on('warning', msg=>{
            Swal.fire(
            'Atención',
            msg,
            'warning'
            )
        });

        Livewire.on('sinresultados', msg=>{
            Swal.fire(
            'No se encontraron registros',
            '',
            'warning'
            )
        });

        Livewire.on('success', msg=>{
            Swal.fire(
            'Excelente!',
            msg,
            'success'
            )
        });

        Livewire.on('error', msg=>{
            Swal.fire(
            'ERROR!',
            msg,
            'error'
            )
        });

        function comprar(menu_id,tipomenu_id){
            Swal.fire({
            title: 'REALIZAR COMPRA?',
            text: "Esta seguro de registrar la compra?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'SI, Registrar',
            cancelButtonText: 'NO, Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('comprar',menu_id,tipomenu_id);
            }
            });        
        }
</script>
@endsection