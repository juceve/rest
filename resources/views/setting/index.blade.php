@extends('layouts.app')

@section('template_title')
Componentes de Inicio |
@endsection

@section('content')
<div class="d-flex justify-content-between w-100 flex-wrap">
    <div class="mb-3 mb-lg-0">
        <h1 class="h4">Componentes de Inicio</h1>
    </div>


</div>
<div class="row">
    {{-- TIPO PAGOS --}}
    <div class="col-xs-12 col-xl-6 mb-4">
        @livewire('settings.tipopagos')
    </div>
    {{-- FIN TIPO PAGOS --}}
</div>
@endsection