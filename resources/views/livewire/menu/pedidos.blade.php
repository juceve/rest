<div>

    {{-- COMPONENTES DE LA PAGINA --}}
    <div class="card" style="background-color: #ffffffdc" wire:ignore>
        <div class="card-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @if ($eventos->count() > 0)
                    @foreach ($eventos as $evento)
                    @php
                    $dia = get_nombre_dia($evento->fecha);
                    @endphp
                    <div class="d-block d-md-none">
                        <button class="nav-link @php if($dia == get_nombre_dia(now())){ echo " active";} @endphp"
                            id="nav-lun-tab" data-bs-toggle="tab" data-bs-target="#nav-{{$dia}}" type="button"
                            role="tab" aria-controls="nav-{{$dia}}" aria-selected="true">
                            {{strtoupper(Str::substr($dia, 0, 3))}}
                        </button>
                    </div>
                    <div class="d-none d-md-block">
                        <button class="nav-link @php if($dia == get_nombre_dia(now())){ echo " active";} @endphp"
                            id="nav-lun-tab" data-bs-toggle="tab" data-bs-target="#nav-{{$dia}}" type="button"
                            role="tab" aria-controls="nav-{{$dia}}" aria-selected="true">
                            {{strtoupper($dia)}}
                        </button>
                    </div>
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
                <div class="tab-pane fade @php if($dia == get_nombre_dia(now())){ echo " show active";} @endphp"
                    id="nav-{{$dia}}" role="tabpanel" aria-labelledby="nav-{{$dia}}">
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
                            <button class="btn btn-sm btn-warning" style="float: right;"
                                wire:click="addCart({{$detalle->menu_id}},'{{$evento->fecha}}')">
                                Añadir <i class="bi bi-cart-plus"></i>
                            </button>
                        </div>
                        <hr>
                        @endforeach
                    </div>

                </div>
                @endforeach
                @endif
            </div>

        </div>
    </div> @if ($countCart > 0)
    <div class="container text-center py-4">
        <a href="#" class="btnPedido">
            Revisar <i class="bi-cart-fill me-1"></i> <span
                class="badge bg-warning text-white ms-1 rounded-pill">{{$countCart}}</span>
        </a>
    </div>
    @endif
    <script>
        Livewire.on('alertSuccess',function(){
        Swal.fire({
        position: 'bottom-end',
        text: 'Agregado correctamente',
        background: '#7DCEA0',
        showConfirmButton: false,
        timer: 800
        })
    })
    </script>
</div>

@php
function get_nombre_dia($fecha)
{
$fechats = strtotime($fecha); //pasamos a timestamp

//el parametro w en la funcion date indica que queremos el dia de la semana
//lo devuelve en numero 0 domingo, 1 lunes,....
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
@endphp