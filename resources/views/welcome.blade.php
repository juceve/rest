@extends('layouts.web2')

@section('content')
<div class="container">

    <div class="form-group py-5 text-center animacion show">
        <img src="{{asset('img/ar_logo.png')}}" class="img-fluid" style="width:50%;">
    </div>

    {{-- <div class="container animacion">
        <a href="{{route('menusemanal')}}" class="myButton">Ver menú semanal</a>
    </div> --}}





</div>
<div class="container">
    <div class="row justify-content-center animacion">
        <div class="col-12 col-md-2">
        </div>
        <div class="col-12 col-md-9">
            <img src="{{asset('img/menusemanal.png')}}" class="img-fluid" style="width: 100%">
            <hr>
            @livewire('menu.cartelera')
            <hr>
        </div>
        <div class="col-12 col-md-1">
        </div>
        <div class="container text-center mb-2">
            <a href="{{route('menusemanal')}}" class="myButton">Realizar Pedidos</a>
        </div>
    </div>


</div>





@endsection

@section('carrito')
@livewire('menu.carritologo')
@endsection