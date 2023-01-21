@php
session_start();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>A&R Catering Service</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('img/favicon.png')}}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{asset('web2/css/styles.css" rel="stylesheet')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@200..900&display=swap">
    <link rel="stylesheet" href="{{asset('admin/vendor/sweetalert2/dist/sweetalert2.min.css')}}">    
    @yield('css')
    <style>
        @font-face {
            font-family: Poppins;
            src: url('{{asset('web2/fonts/Poppins.ttf')}}') format('truetype');
        }

        body {
            font-family: Poppins;
            background-image: url('{{asset('img/background.jpg')}}');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;

        }

        .myButton {
            box-shadow: inset 0px 1px 0px 0px #9acc85;
            background: linear-gradient(to bottom, #74ad5a 5%, #68a54b 100%);
            background-color: #74ad5a;
            border-radius: 40px;
            border: 1px solid #3b6e22;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: Arial;
            font-size: 20px;
            font-weight: bold;
            padding: 14px 52px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #92b879;

            &:hover {
                background: linear-gradient(to bottom, #68a54b 5%, #74ad5a 100%);
                background-color: #68a54b;
            }

            &:active {
                position: relative;
                top: 1px;
            }
        }

        .btnPedido {
            box-shadow: 0px 10px 14px -7px #97c4fe;
            background: linear-gradient(to bottom, #3d94f6 5%, #1e62d0 100%);
            background-color: #3d94f6;
            border-radius: 42px;
            border: 1px solid #337fed;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: Arial;
            font-size: 22px;
            font-weight: bold;
            padding: 13px 52px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #1570cd;
        }

        .btnPedido:hover {
            background: linear-gradient(to bottom, #1e62d0 5%, #3d94f6 100%);
            background-color: #1e62d0;
        }

        .btnPedido:active {
            position: relative;
            top: 1px;
        }




        .animacion {
            animation-name: animar;
            animation-duration: 1.5s;
        }

        @keyframes animar {
            0% {
                transform: scale(.3);
            }
        }
    </style>
    
</head>

<body>
    @php
    session(['idCarrito' => session_id()]);
    @endphp
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-dark bg-opacity-75">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">
                <img src="{{asset('img/logo_banner.png')}}" style="width: 200px; height: 40px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 ">
                    <li class="nav-item"><a class="nav-link text-warning" aria-current="page" href="/">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-warning" href="{{route('menusemanal')}}">Menú
                            semanal</a></li>

                </ul>
                @yield('carrito')
                {{-- @livewire('menu.carritologo') --}}
            </div>
            <hr>
        </div>
    </nav>
    
        @yield('content')
    
        
    


    <!-- Core theme JS-->
    <script src="{{asset('web2/js/scripts.js')}}"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="{{asset('admin/vendor/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <x:notify-messages />
    @notifyJs
    @yield('js')
</body>

</html>