@extends('layouts.web2')

@section('content')

    <table style="width: 100%">
        <tr>
            <td align="center">
                <div class="container animacion py-5">
                    <img src="{{asset('img/ar_logo.png')}}" class="img-fluid">
                </div>
            </td>
        </tr>
        <tr>
            <td align="center">
                <div class="container animacion">
                    <a href="{{route('menusemanal')}}" class="myButton">Ver menú semanal</a>
                </div>
            </td>
        </tr>
    </table>



@endsection

@section('carrito')
@livewire('menu.carritologo')
@endsection