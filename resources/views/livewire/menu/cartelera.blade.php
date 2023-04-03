<div>
    @php
        $colores = array("success","warning","info","primary","danger","secondary");
        $i = 0;
    @endphp
    <div class="content">
        @if ($eventos->count() > 0)
    <div class="row justify-content-center">
        @foreach ($eventos as $item)
        <div class="col-12 col-lg-4 mb-3">
            <div class="card" style="height: 100%">
                <div class="card-header text-white bg-{{$colores[$i]}} text-center"><small>{{fechaes($item->fecha)}}</small> </div>
                <div class="card-body">
                    @php
                    $detalles = $item->detalleeventos;
                    $i++;
                    @endphp
                    @foreach ($detalles as $detalle)                    
                    <h5 class="card-title text-success">{{$detalle->menu->tipomenu->nombre}}</h5>
                    <small class="card-text">{{$detalle->menu->descripcion}}</small>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div><br>
        @endforeach
    </div>
    @endif
    </div>
    
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
return $nombredia . " " . $numeroDia . " de " . $nombreMes;
}

@endphp