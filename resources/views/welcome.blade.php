@extends('layouts.web2')

@section('content')
<section class="py-5">
    <div class="container text-center animacion">
        <img src="{{asset('img/ar_logo.png')}}" class="img-fluid">
    </div>
</section>
<section class="py-5">
    <div class="container text-center animacion">
        <a href="{{route('menusemanal')}}" class="myButton">Ver menú semanal</a>
    </div>

</section>
@endsection