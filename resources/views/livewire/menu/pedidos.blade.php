<div class="container-fluid">

    <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-12 col-md-7">

            <form id="regForm">
                <div class="all-steps mb-1" id="all-steps" wire:ignore>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
                {{-- MENU SEMANA --}}

                <div class="tab" wire:ignore>
                    <div class="card" style="background-color: #ffffffdc">
                        <div class="card-header mr-1" style="background-color: #4CAF50">
                            <div class="row">
                                <div class="col-9">
                                    <span class="text-white">Seleccione su pedido</span>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="btn btn-outline-warning  position-relative">
                                        <i class="bi bi-cart"></i> <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"><label
                                                id="countCart" class="text-dark">{{$countCart}}</label></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            @if ($eventos->count() > 0)
                            <nav>
                                <div class="nav nav-tabs" style="background-color: #039ffa27" id="nav-tab"
                                    role="tablist">
                                    @if ($eventos->count() > 0)
                                    @foreach ($eventos as $evento)
                                    @php
                                    $dia = get_nombre_dia($evento->fecha);
                                    @endphp

                                    <button class="nav-link 
                                    @php if($dia == get_nombre_dia(now())){ echo " active";}@endphp @php if(
                                        $evento->fecha < date('Y-m-d') ){ echo " disabled" ;}@endphp" id="nav-lun-tab"
                                            data-bs-toggle="tab" data-bs-target="#nav-{{$dia}}" type="button" role="tab"
                                            aria-controls="nav-{{$dia}}" aria-selected="true">
                                            <span class="d-block d-md-none">{{strtoupper(Str::substr($dia, 0,
                                                3))}}</span>
                                            <span class="d-none d-md-block">{{strtoupper($dia)}}</span>
                                    </button>

                                    @endforeach
                                    @endif

                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                @if ($eventos->count() > 0)
                                @foreach ($eventos as $evento)
                                @php
                                $dia = get_nombre_dia($evento->fecha);
                                @endphp
                                <div class="tab-pane fade @php if($dia == get_nombre_dia(now())){ echo " show active";}
                                    @endphp" id="nav-{{$dia}}" role="tabpanel" aria-labelledby="nav-{{$dia}}">
                                    <div class="container py-3">

                                        <div class="row">
                                            <div class="col-12 py-2 text-center">
                                                <label><strong>{{strtoupper(fechaEs($evento->fecha))}}</strong></label>
                                                <hr>
                                            </div>
                                        </div>

                                        @foreach ($evento->detalleeventos as $detalle)

                                        <div class="col-12">
                                            <strong>{{$detalle->menu->tipomenu->nombre}}</strong>
                                        </div>

                                        <div class="col-12 mb-2">
                                            {{$detalle->menu->descripcion}}
                                        </div>

                                        <div class="col-12 mb-5">
                                            @php
                                            $vb = "";
                                            $vs = "d-none";
                                            foreach ($cartMenu as $item) {
                                            if(($item->fecha == $evento->fecha) && ($item->menu_id ==
                                            $detalle->menu_id))
                                            {
                                            $vs = "";
                                            $vb = "d-none";

                                            break;
                                            }
                                            }
                                            @endphp
                                            <button class="btn btn-sm btn-warning {{$vb}}" style="float: right;"
                                                onclick="event.preventDefault()"
                                                id="{{$evento->fecha.'-'.$detalle->menu_id}}"
                                                wire:click="addCart({{$detalle->menu_id}},'{{$evento->fecha}}')">
                                                Añadir <i class="bi bi-cart-plus"></i>
                                            </button>
                                            <small id="{{$evento->fecha.'-'.$detalle->menu_id}}-sel"
                                                class="{{$vs}} text-success" style="float: right;">*Seleccionado</small>
                                        </div>
                                        <hr>
                                        @endforeach
                                    </div>

                                </div>
                                @endforeach
                                @endif
                            </div>
                            @else
                            <span>No existe Menu para esta semana</span>
                            @endif


                        </div>
                    </div>
                </div>
                {{-- FIN MENU SEMANA --}}

                {{-- REVISAR PEDIDO --}}
                <div class="tab">
                    <h4 class="text-primary">DETALLE DEL PEDIDO</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover ">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th width="75">FECHA</th>
                                    <th>PRODUCTO</th>
                                    <th width="12"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cartMenu->count()>0)
                                @foreach ($cartMenu as $cart)
                                @php
                                    $fechaNum = strtotime($cart->fecha);
                                    $mes = date('m',$fechaNum);
                                    $dia = date('d',$fechaNum);
                                    $mes = mesEs($mes);
                                @endphp
                                <tr style="vertical-align: middle;">
                                    <td >
                                        <span >{{$dia.'-'.$mes}}</span>
                                    </td>
                                    <td>
                                        <strong>{{$cart->menu->nombre}}</strong>
                                        <br>
                                        <span style="font-size: 12">                                        
                                        {{$cart->menu->descripcion}}
                                        </span>
                                        
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-danger" title="Eliminar">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>
                {{-- FIN REVISAR PEDIDO --}}

                {{-- SELECCIONE USUARIO --}}
                <div class="tab">

                </div>
                {{-- FIN SELECCIONE USUARIO --}}

                <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png"
                        width="100" class="mb-4">
                    <h3>Thanks for your Donation!</h3> <span>Your donation has been entered! We will contact you
                        shortly!</span>
                </div>
                <div class="py-3" style="overflow:auto;" id="nextprevious">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)" wire:ignore>Anterior</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('css')
    <link rel="stylesheet" href="{{asset('web2/css/customPedidos.css')}}">
    @endsection

    @section('js')
    <script src="{{asset('web2/js/customPedidos.js')}}"></script>
    @endsection
    {{-- COMPONENTES DE LA PAGINA --}}


    {{-- @if ($countCart > 0)
    <div class="container text-center py-4">
        <a href="#" class="btnPedido">
            Revisar <i class="bi-cart-fill me-1"></i> <span
                class="badge bg-warning text-white ms-1 rounded-pill">{{$countCart}}</span>
        </a>
    </div>
    @endif --}}
    <script>
        Livewire.on('alertSuccess',function(){
        Swal.fire({
        position: 'bottom-end',
        text: 'Agregado correctamente',
        background: '#7DCEA0',
        showConfirmButton: false,
        timer: 800
        })
    });

    Livewire.on('selectButton',id=>{
        const button = document.getElementById(id);
        button.classList.contains('someClass');
        button.classList.add('d-none');

        const small = document.getElementById(id+"-sel");
        small.classList.contains('someClass');
        small.classList.remove('d-none');
    });

    Livewire.on('actCon', count =>{
        document.getElementById('countCart').innerHTML= count;
    })   
    </script>
</div>




@php
function get_nombre_dia($fecha)
{
$fechats = strtotime($fecha);

switch (date('w', $fechats)) {
case 0:
return "Domingo";
break;
case 1:
return "Lunes";
break;
case 2:
return "Martes";
break;
case 3:
return "Miercoles";
break;
case 4:
return "Jueves";
break;
case 5:
return "Viernes";
break;
case 6:
return "Sabado";
break;
}
}

function fechaEs($fecha)
{
$fecha = substr($fecha, 0, 10);
$numeroDia = date('d', strtotime($fecha));
$dia = date('l', strtotime($fecha));
$mes = date('F', strtotime($fecha));
$anio = date('Y', strtotime($fecha));
$dias_ES = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
$nombredia = str_replace($dias_EN, $dias_ES, $dia);
$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre",
"Noviembre", "Diciembre");
$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
"November", "December");
$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
return $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio;
}

function mesEs($mes){
switch ($mes) {
case '01':
return 'Ene';
break;
case '02':
return 'Feb';
break;
case '03':
return 'Mar';
break;
case '04':
return 'Abr';
break;
case '05':
return 'May';
break;
case '06':
return 'Jun';
break;
case '07':
return 'Jul';
break;
case '08':
return 'Ago';
break;
case '09':
return 'Sep';
break;
case '10':
return 'Oct';
break;
case '11':
return 'Nov';
break;
case '12':
return 'Dic';
break;
}
}
@endphp