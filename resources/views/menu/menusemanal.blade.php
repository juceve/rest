@extends('layouts.web2')
@livewireStyles
@section('content')
<div class="container-fluid text-center py-4 text-warning mb-3" style="background-color: #10620093">
  <h2>MENU SEMANAL</h2>
</div>
<div class="container ">
  @livewire('menu.pedidos')
</div>
@endsection
@livewireScripts