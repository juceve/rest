<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>A&R Catering Service</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('web/assets/img/favicon.ico')}}" rel="icon">
    <link href="{{asset('web/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('web/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('web/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('web/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('web/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('web/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('web/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('web/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <!-- Sweet Alert -->
    <link type="text/css" href="{{asset('admin/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <!-- Fontawespme -->
    <link type="text/css" href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('web/assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Restaurantly - v3.9.1
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    @yield('css')
    @livewireStyles
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-center justify-content-md-between">

            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-phone d-flex align-items-center"><span>+591 70010200</span></i>
                <i class="bi bi-clock d-flex align-items-center ms-4"><span> Lun-Vie: 07:00 - 16:00 Hrs.</span></i>
            </div>

            <div class="languages d-none d-md-flex align-items-center">
                {{-- <a href="#">Iniciar sesión</a> --}}
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-cente">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

            <a class="logo me-auto me-lg-0 scrollto" href="/">
                <h1><strong>A&R</strong><span style="font-size: 20px"> Catering Service</span></h1>
            </a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="{{asset('web/assets/img/logo.png')}}" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            <a href="/" class="book-a-table-btn d-none d-lg-flex">Retornar</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </section><!-- End Hero -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('web/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('web/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('web/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('web/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('web/assets/vendor/php-email-form/validate.js')}}"></script>
    <!-- Sweet Alerts 2 -->
    <script src="{{asset('admin/vendor/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <!-- Template Main JS File -->
    <script src="{{asset('web/assets/js/main.js')}}"></script>
    @yield('js')
    @livewireScripts
</body>

</html>