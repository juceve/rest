<div>
    <div class="container-fluid text-center py-3 text-warning" style="background-color: #10620093">
        <h5>MENU SEMANAL</h5>
    </div>
    <div class="content p-2">
        <div class="container py-3" style="background-color: #ffffffc9">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-12 col-md-7">
                    @if(!empty($successMessage))
                    <div class="alert alert-success">
                        {{ $successMessage }}
                    </div>
                    @endif

                    <div class="text-center">
                        <!-- progressbar -->
                        <ul class="progressbar">
                            <li></li>
                            <li></li>
                            <li class="active"></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="row setup-content" id="step-3">
                        <div class="col-xs-12">
                            <div class="card mb-2" style="background-color: #ffffffd2">
                                <div class="card-header" style="background-color: #039ffa27">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-estudiantes-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-estudiantes" type="button"
                                                role="tab" aria-controls="pills-estudiantes"
                                                aria-selected="true">Estudiantes</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-tutores-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-tutores" type="button" role="tab"
                                                aria-controls="pills-tutores" aria-selected="false">Tutores</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-estudiantes" role="tabpanel"
                                            aria-labelledby="pills-estudiantes-tab">
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="input-group mb-3">
                                                            <input type="search" class="form-control"
                                                                placeholder="Código estudiante"
                                                                aria-label="Código estudiante"
                                                                aria-describedby="button-addon2"
                                                                wire:model.debounce.500ms="busquedaEst"
                                                                wire:keydown.enter="buscarEstudiante">
                                                            <button class="btn btn-sm btn-outline-primary" type="button"
                                                                id="button-addon2" wire:click="buscarEstudiante"><i
                                                                    class="bi bi-search"></i> Buscar</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row form-group form-group-sm {{$dnone}}"
                                                    id="formEstudiante">
                                                    <div class="col-6 col-md-6 mb-2">
                                                        <label style="font-size: 12">Cédula</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            wire:model="bCedula" readonly>
                                                    </div>
                                                    <div class="col-6 col-md-6 mb-2">
                                                        <label style="font-size: 12">Nombre</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            wire:model="bNombre" readonly>
                                                    </div>
                                                    <div class="col-6 col-md-6 mb-2">
                                                        <label style="font-size: 12">Colegio</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            wire:model="bColegio" readonly>
                                                    </div>
                                                    <div class="col-6 col-md-6 mb-2">
                                                        <label style="font-size: 12">Curso</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            wire:model="bCurso" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-tutores" role="tabpanel"
                                            aria-labelledby="pills-tutores-tab">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card mb-2 {{$dnone}}" id="formTotal" style="background-color: #ffffffd2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <label class="mt-1"><strong>Cant.:</strong> {{$countCart}} prod.</label>
                                        </div>
                                        <div class="col-7">
                                            <div class="input-group">
                                                <span class="input-group-text text-success"
                                                    id="inputGroup-sizing-default"
                                                    style="background-color: #00ce5610">Total Bs.:</span>
                                                <input id="total_estudiante" type="text" class="form-control"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-default"
                                                    wire:model="total_estudiante" readonly>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="card {{$dnone}} mb-2" id="formFormaPago" style="background-color: #ffffffd2">
                                <div class="card-header text-success" style="background-color: #00ce5610">
                                    <span>Formas de Pago:</span>
                                </div>
                                <div class="card-body">
                                    <div class="form-check mb-2">
                                        <input wire:model="formapago" class="form-check-input" type="radio" name="rbPagos" id="pagoLocal"
                                            value="local" checked>
                                        <label class="form-check-label" for="pagoLocal">
                                            En el local
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input wire:model="formapago" class="form-check-input" type="radio" name="rbPagos" id="pagoBanco"
                                            value="bancario">
                                        <label class="form-check-label" for="pagoBanco">
                                            Trans. Bancaria
                                        </label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input wire:model="formapago" class="form-check-input" type="radio" name="rbPagos" id="pagoQr"
                                            value="qr">
                                        <label class="form-check-label" for="pagoQr">
                                            Qr
                                        </label>
                                    </div>
                                    <div class="form-group mb-2 mt-3">
                                        <div class="col-12 col-md-8">
                                            <input class="form-control form-control-sm" accept="image/jpeg" id="formFileSm" type="file" wire:model="comprobante">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="" style="float: right">
                                <a href="{{route('resumenpedido')}}" class="btn btn-secondary nextBtn btn-lg pull-right"
                                    type="button">
                                    <i class="bi bi-chevron-left"></i> Pre
                                </a>
                                <button wire:click="next" wire:loading.class="bg-gray" class="btn btn-primary nextBtn btn-lg pull-right {{$dnone}}"
                                    type="button">
                                    Procesar <i class="bi bi-check2-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    @section('css')
    <link rel="stylesheet" href="{{asset('web2/css/wizard.css')}}">
    @endsection
    @section('js')
    <script src="{{asset('web2/js/formapago.js')}}"></script>
    @endsection