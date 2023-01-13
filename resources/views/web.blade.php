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

    <!-- Template Main CSS File -->
    <link href="{{asset('web/assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Restaurantly - v3.9.1
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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

            <a class="logo me-auto me-lg-0 scrollto" href="#hero">
                <h1><strong>A&R</strong><span style="font-size: 20px"> Catering Service</span></h1>
            </a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="{{asset('web/assets/img/logo.png')}}" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
                    <li><a class="nav-link scrollto" href="#menu">Menú</a></li>
                    <li><a class="nav-link scrollto" href="#specials">Especiales</a></li>
                    <li><a class="nav-link scrollto" href="{{route('customers')}}">Registrarme</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            <a href="{{ route('login') }}" class="book-a-table-btn d-none d-lg-flex">Iniciar Sesión</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <h1>Bienvenidos a <span>A&R Catering</span></h1>
                    <h2>Entregando deliciosos alimentos desde hace 15 años!</h2>

                    <div class="btns">
                        <a href="#menu" class="btn-menu animated fadeInUp scrollto">Nuestro Menú</a>
                        {{-- <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative"
                    data-aos="zoom-in" data-aos-delay="200">
                    <a href="https://www.youtube.com/watch?v=u6BOC7CDUTQ" class="glightbox play-btn"></a>
                </div>

            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">


        <!-- ======= Why Us Section ======= -->
        {{-- <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Why Us</h2>
                    <p>Why Choose Our Restaurant</p>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="box" data-aos="zoom-in" data-aos-delay="100">
                            <span>01</span>
                            <h4>Lorem Ipsum</h4>
                            <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero
                                placeat</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="200">
                            <span>02</span>
                            <h4>Repellat Nihil</h4>
                            <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire
                                leno para dest</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="300">
                            <span>03</span>
                            <h4> Ad ad velit qui</h4>
                            <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam
                                quis</p>
                        </div>
                    </div>

                </div>

            </div>
        </section> --}}
        <!-- End Why Us Section -->

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>MENÚ</h2>
                    <p>Mirá estas sabrosas propuestas</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                            <li data-filter="*" @php if(date('l')=='Sunday' || date('l')=='Saturday'
                                ){echo 'class="filter-active"' ;} @endphp>Semana</li>
                            <li data-filter=".filter-starters" @php if(date('l')=='Monday'
                                ){echo 'class="filter-active"' ;} @endphp>Lunes</li>
                            <li data-filter=".filter-salads" @php if(date('l')=='Thuesday'
                                ){echo 'class="filter-active"' ;} @endphp>Martes</li>
                            <li data-filter=".filter-starters" @php if(date('l')=='Wednesday'
                                ){echo 'class="filter-active"' ;} @endphp>Miercoles</li>
                            <li data-filter=".filter-specialty" @php if(date('l')=='Thursday'
                                ){echo 'class="filter-active"' ;} @endphp>Jueves</li>
                            <li data-filter=".filter-salads" @php if(date('l')=='Friday' ){echo 'class="filter-active"'
                                ;} @endphp>Viernes</li>
                        </ul>
                    </div>
                </div>

                <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-6 menu-item filter-starters">
                        <img src="{{asset('web/assets/img/menu/lobster-bisque.jpg')}}" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="#">Lobster Bisque</a><span>$5.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-specialty">
                        <img src="{{asset('web/assets/img/menu/bread-barrel.jpg')}}" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="#">Bread Barrel</a><span>$6.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-starters">
                        <img src="{{asset('web/assets/img/menu/cake.jpg')}}" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="#">Crab Cake</a><span>$7.95</span>
                        </div>
                        <div class="menu-ingredients">
                            A delicate crab cake served on a toasted roll with lettuce and tartar sauce
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-salads">
                        <img src="{{asset('web/assets/img/menu/caesar.jpg')}}" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="#">Caesar Selections</a><span>$8.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-specialty">
                        <img src="{{asset('web/assets/img/menu/tuscan-grilled.jpg')}}" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="#">Tuscan Grilled</a><span>$9.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Grilled chicken with provolone, artichoke hearts, and roasted red pesto
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-starters">
                        <img src="{{asset('web/assets/img/menu/mozzarella.jpg')}}" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="#">Mozzarella Stick</a><span>$4.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-salads">
                        <img src="{{asset('web/assets/img/menu/greek-salad.jpg')}}" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="#">Greek Salad</a><span>$9.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Fresh spinach, crisp romaine, tomatoes, and Greek olives
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-salads">
                        <img src="{{asset('web/assets/img/menu/spinach-salad.jpg')}}" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="#">Spinach Salad</a><span>$9.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-specialty">
                        <img src="{{asset('web/assets/img/menu/lobster-roll.jpg')}}" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="#">Lobster Roll</a><span>$12.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Menu Section -->

        <!-- ======= Specials Section ======= -->
        <section id="specials" class="specials">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Especiales</h2>
                    <p>Platos extras</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Bife con huevo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Filete de pollo a la plancha</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Milanesa de Red</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Milanesa de Pollo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Panini Filadelfia de Pollo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Panini Filadelfia de Lomito</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Architecto ut aperiam autem id</h3>
                                        <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente
                                            dila parde sonata raqer a videna mareta paulona marka</p>
                                        <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint.
                                            Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est
                                            repellat minima eveniet eius et quis magni nihil. Consequatur dolorem
                                            quaerat quos qui similique accusamus nostrum rem vero</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset('web/assets/img/specials-1.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Et blanditiis nemo veritatis excepturi</h3>
                                        <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente
                                            dila parde sonata raqer a videna mareta paulona marka</p>
                                        <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et
                                            reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et
                                            velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto
                                            madirna desera vafle de nideran pal</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset('web/assets/img/specials-2.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                                        <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non
                                            enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat
                                            perferendis aut</p>
                                        <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis
                                            quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima
                                            molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam.
                                            Soluta et harum voluptatem optio quae</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset('web/assets/img/specials-3.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-4">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                                        <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure
                                            voluptas iure porro quis delectus</p>
                                        <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam
                                            necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in
                                            consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam
                                            quia a laborum inventore</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset('web/assets/img/specials-4.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-5">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                                        <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro
                                            quia.</p>
                                        <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis
                                            recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui
                                            quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset('web/assets/img/specials-5.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Specials Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2></h2>
                    <p>Contáctanos</p>
                </div>
            </div>

            {{-- <div data-aos="fade-up">
                <iframe style="border:0; width: 100%; height: 350px;"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                    frameborder="0" allowfullscreen></iframe>
            </div> --}}

            <div class="container" data-aos="fade-up">

                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>

                            <div class="open-hours">
                                <i class="bi bi-clock"></i>
                                <h4>Open Hours:</h4>
                                <p>
                                    Monday-Saturday:<br>
                                    11:00 AM - 2300 PM
                                </p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="8" placeholder="Message"
                                    required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

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

    <!-- Template Main JS File -->
    <script src="{{asset('web/assets/js/main.js')}}"></script>

</body>

</html>