<!DOCTYPE html>
<html lang="es">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>@yield('template_title'){{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Admin Rest">
    <!-- Sweet Alert -->
    <link type="text/css" href="{{asset('admin/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <!-- Notyf -->
    <link type="text/css" href="{{asset('admin/vendor/notyf/notyf.min.css')}}" rel="stylesheet">
    <!-- Fontawespme -->
    <link type="text/css" href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!-- Volt CSS -->
    <link type="text/css" href="{{asset('admin/css/volt.css')}}" rel="stylesheet">
    <!-- DataTables -->
    <link type="text/css" href="{{asset('admin/vendor/datatables/media/css/jquery.dataTables.min.css')}}"
        rel="stylesheet">
    <!-- Select2 -->
    <link type="text/css" href="{{asset('admin/vendor/select2/css/select2.min.css')}}" rel="stylesheet">

    <link type="text/css" href="{{asset('admin/css/custom.css')}}" rel="stylesheet">

    <link rel="icon" type="image/jpg" href="{{Storage::url('img/favicon_food.png')}}" />
    @livewireStyles
    @yield('css')
</head>

<body>
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="home">
            <img class="rounded-circle p-1" src="{{Storage::url('img/favicon_food.png')}}" width="60px" alt=""> <span
                style="color: rgb(214, 189, 121)">{{config('app.name')}}</span>
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="loading show d-none" id="loading">
        <div class="spin"></div>
    </div>

    <main class="content">
        @include('layouts.sidebar')

        @include('layouts.navbar')
        <div class="mt-3">
            @yield('content')
        </div>
    </main>

    <!-- JQuery -->
    <script src="{{asset('admin/vendor/jquery/jquery.js')}}"></script>
    <!-- Core -->
    <script src="{{asset('admin/vendor/@popperjs/core/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Vendor JS -->
    <script src="{{asset('admin/vendor/onscreen/dist/on-screen.umd.min.js')}}"></script>
    <!-- Smooth scroll -->
    <script src="{{asset('admin/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
    <!-- Charts -->
    <script src="{{asset('admin/vendor/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('admin/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!-- Datepicker -->
    <script src="{{asset('admin/vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>
    <!-- Sweet Alerts 2 -->
    <script src="{{asset('admin/vendor/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <!-- Vanilla JS Datepicker -->
    <script src="{{asset('admin/vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>
    <!-- Notyf -->
    <script src="{{asset('admin/vendor/notyf/notyf.min.js')}}"></script>
    <!-- Simplebar -->
    <script src="{{asset('admin/vendor/simplebar/dist/simplebar.min.js')}}"></script>
    <!-- Volt JS -->
    <script src="{{asset('admin/assets/js/volt.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('admin/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('admin/vendor/select2/js/select2.full.min.js')}}"></script>

    @livewireScripts
    @if (session('success') != '')
    {
    <script>
        Swal.fire(
                'Excelente!',
                '{{ session('success') }}',
                'success'
            );
    </script>
    }
    @endif
    @if (session('error') != '')
    {
    <script>
        Swal.fire(
                'Error!',
                '{{ session('error') }}',
                'error'
            );
    </script>
    }
    @endif
    <script>
        $('.table-responsive').on('show.bs.dropdown', function() {
                $('.table-responsive').css("overflow", "inherit");
            });

            $('.table-responsive').on('hide.bs.dropdown', function() {
                $('.table-responsive').css("overflow", "auto");
            })

            
    </script>
    <script src="{{asset('admin/js/custom.js')}}"></script>
    @yield('js')
</body>

</html>