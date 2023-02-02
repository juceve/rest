<div>
    {{-- BOTONERAS --}}
    <h3 class="text-center mb-4">ENTREGA DE MERIENDAS</h3>
    <div class="row mb-2">
        <div class="col-12 col-md-4 d-grid gap-2 mb-2" style="height: 90px">
            <button class="btn btn-info fs-4 text-center " style="height: 100%" wire:click='mostrarIndividual'>
                <i class="fas fa-concierge-bell"></i> INDIVIDUAL
            </button>
        </div>
        <div class="col-12 col-md-4 d-grid gap-2 mb-2" style="height: 90px" wire:click='mostrarCurso'>
            <button class="btn btn-success fs-4 text-white text-center" style="height: 100%">
                <i class="fas fa-clipboard-list"></i> POR CURSO
            </button>
        </div>
        <div class="col-12 col-md-4 d-grid gap-2 mb-2" style="height: 90px" wire:click='mostrarVentas'>
            <button class="btn btn-primary fs-4 text-white text-center" style="height: 100%">
                <i class="fas fa-cash-register"></i> VENTAS
            </button>
        </div>
    </div>
    <div class="row {{$dnIndividual}}">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <label for="">CODIGO ESTUDIANTE</label>
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" placeholder="Ingrese el código" id="busquedaCodigo"
                            aria-label="Ingrese el código" aria-describedby="button-addon2"
                            wire:model.debounce.500ms="busquedaCodigo" wire:keydown.enter="buscarEstudiante">
                        <button class="btn btn-info" type="button" id="button-addon2" wire:click="buscarEstudiante"><i
                                class="fas fa-search"></i> Buscar</button>
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
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <span class="text-info fs-5">PRODUCTOS DISPONIBLES DE ENTREGA</span>
                </div>
                <div class="card-body">
                    @if (!is_null($lonchera))
                    @foreach ($lonchera->detalleloncheras as $detalle)
                    {{-- {{$detalle->menu->nombre}} --}}
                    @if ($detalle->menu->tipomenu_id == 1)
                    @if ($detalle->entregado == 0)
                    <div class="card mb-3">
                        <div class="row g-0" style="background-color: #eef8ec">
                            <div class="col-md-3 rounded-start"
                                style="background-image: url({{Storage::url('img/entregas/merienda.jpg')}});height: 100; "">
                                
                            </div>
                            <div class=" col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">MERIENDA</h5>
                                    <p>
                                        {{$detalle->menu->nombre}}
                                    </p>
                                    <small>
                                        {{$detalle->menu->descripcion}}
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-success text-white fs-5" style="height: 100%; width: 100% "
                                    onclick="despachar({{$detalle->id}})">
                                    DESPACHAR <i class="fas fa-arrow-alt-circle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="container-fluid mb-3">
                        <label class="form-control text-danger fs-5">MERIENDA ENTREGADA</label>
                        <hr>
                    </div>
                    @endif


                    @else
                    @if ($detalle->entregado == 0)
                    <div class="card mb-3">
                        <div class="row g-0" style="background-color: #ecf6f8">
                            <div class="col-md-3 rounded-start"
                                style="background-image: url({{Storage::url('img/entregas/almuerzo.jpg')}});height: 100; ">

                            </div>
                            <div class=" col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">ALMUERZO</h5>
                                    <p>
                                        {{$detalle->menu->nombre}}
                                    </p>
                                    <small>
                                        {{$detalle->menu->descripcion}}
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                @php
                                $disabled = " disabled";
                                if (date('Y-m-d H:i:s') > strtotime(date('Y-m-d').' 12:00:00')) {
                                $disabled = "";
                                }
                                @endphp

                                <button class="btn btn-info fs-5" style="height: 100%; width: 100% "
                                    onclick="despachar({{$detalle->id}})" {{$disabled}}>DESPACHAR <i
                                        class="fas fa-arrow-alt-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="container-fluid mb-3">
                        <label class="form-control text-danger fs-5">ALMUERZO ENTREGADO</label>
                    </div>
                        
                    @endif


                    @endif

                    @endforeach
                    @endif


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
</script>
@endsection