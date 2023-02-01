<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-7 mb-3">
                    <label for="">INFORMACIÓN DEL PEDIDO</label>
                    <div class="table-responsive mb-3">
                        <table class="table table-bordered table-striped" style="width: 100%" style="scr">
                            <tbody>
                                <tr>
                                <tr>
                                    <td style="width: 50px">
                                        <strong>FECHA</strong>
                                    </td>
                                    <td>
                                        {{$venta->fecha}}
                                    </td>
                                </tr>
                                <td style="width: 50px">
                                    <strong>CLIENTE</strong>
                                </td>
                                <td>
                                    {{$venta->cliente}}
                                </td>
                                </tr>
                                <tr>
                                    <td style="width: 50px">
                                        <strong>ESTADO PAGO</strong>
                                    </td>
                                    <td>
                                        {{$venta->estadopago->nombre}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50px">
                                        <strong>IMPORTE</strong>
                                    </td>
                                    <td>
                                        {{$venta->importe}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50px">
                                        <strong>TIPO PAGO</strong>
                                    </td>
                                    <td>
                                        {{$pago->tipopago}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50px">
                                        <strong>ESTABLECIMIENTO</strong>
                                    </td>
                                    <td>
                                        {{$pago->sucursal}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-6 d-grid gap-2">

                            <button class="btn btn-success text-white fs-5" style="float: center" onclick="confirmar()">
                                @if (($pago->tipopago_id == 2) || ($pago->tipopago_id == 3))
                                APROBAR <i class="far fa-check-circle"></i>
                                @else
                                COBRAR <i class="fas fa-cash-register"></i>
                                @endif
                            </button>

                        </div>
                        <div class="col-6 d-grid gap-2">
                            <a href="{{route('vpagos')}}" class="btn btn-danger text-white fs-5">
                                CANCELAR <i class="fas fa-ban"></i>
                            </a>
                        </div>
                    </div>


                </div>
                <div class="col-12 col-md-5">
                    @if (($pago->tipopago_id == 2) || ($pago->tipopago_id == 3))
                    <label for="">COMPROBANTE ADJUNTO</label>
                    <img class="img-thumbnail"
                        src="{{Storage::url('depositos/'.$tipopago->abreviatura.'/'.$pago->id.'.jpg')}}" alt="">
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    function confirmar(){
        Swal.fire({
            title: 'FINALIZAR OPERACIÓN',
            text: "Está seguro de realizar esta operación?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, continuar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('aprobarPedido');
            }
        });
    }
</script>
@endsection