<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AZ Berita </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}assets-berita/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('') }}assets-berita/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets-berita/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets-berita/css/ticker-style.css">
    <link rel="stylesheet" href="{{ asset('') }}assets-berita/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('') }}assets-berita/css/slicknav.css">
    <link rel="stylesheet" href="{{ asset('') }}assets-berita/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets-berita/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('') }}assets-berita/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets-berita/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('') }}assets-berita/css/slick.css">
    <link rel="stylesheet" href="{{ asset('') }}assets-berita/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('') }}assets-berita/css/style.css">
</head>

<body>

    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">

                <div class="header-mid d-none d-md-block">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="index.html"><img src="{{ asset('') }}assets-berita/img/logo/logo.png"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-right ">
                                    <img src="{{ asset('') }}assets-berita/img/hero/header_card.jpg"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="index.html"><img src="{{ asset('') }}assets-berita/img/logo/logo.png"
                                            alt=""></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation">
                                            @foreach ($kategori as $item)
                                                <li><a
                                                        href="{{ route('home.BeritaKategori', $item->KategoriID) }}">{{ $item->Nama }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Berita Terbaru</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.
                                        </li>
                                        <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                        <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Trending Area End -->



        <div class="pagination-area pb-45 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item"><a class="page-link" href="#"><span
                                                class="flaticon-arrow roted"></span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><span
                                                class="flaticon-arrow right-arrow"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End pagination  -->
    </main>

    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding fix">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="single-footer-caption">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img
                                            src="{{ asset('') }}assets-berita/img/logo/logo2_footer.png"
                                            alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>Suscipit mauris pede for con sectetuer sodales adipisci for cursus fames
                                            lectus tempor da blandit gravida sodales Suscipit mauris pede for con
                                            sectetuer sodales adipisci for cursus fames lectus tempor da blandit gravida
                                            sodales Suscipit mauris pede for sectetuer.</p>
                                    </div>
                                </div>
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4  col-sm-6">
                        <div class="single-footer-caption mt-60">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <p>Heaven fruitful doesn't over les idays appear creeping</p>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank"
                                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                            method="get" class="subscribe_form relative mail_part">
                                            <input type="email" name="email" id="newsletter-form-email"
                                                placeholder="Email Address" class="placeholder hide-on-focus"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = ' Email Address '">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm"><img
                                                        src="{{ asset('') }}assets-berita/img/logo/form-iocn.png"
                                                        alt=""></button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50 mt-60">
                            <div class="footer-tittle">
                                <h4>Instagram Feed</h4>
                            </div>
                            <div class="instagram-gellay">
                                <ul class="insta-feed">
                                    <li><a href="#"><img
                                                src="{{ asset('') }}assets-berita/img/post/instra1.jpg"
                                                alt=""></a>
                                    </li>
                                    <li><a href="#"><img
                                                src="{{ asset('') }}assets-berita/img/post/instra2.jpg"
                                                alt=""></a>
                                    </li>
                                    <li><a href="#"><img
                                                src="{{ asset('') }}assets-berita/img/post/instra3.jpg"
                                                alt=""></a>
                                    </li>
                                    <li><a href="#"><img
                                                src="{{ asset('') }}assets-berita/img/post/instra4.jpg"
                                                alt=""></a>
                                    </li>
                                    <li><a href="#"><img
                                                src="{{ asset('') }}assets-berita/img/post/instra5.jpg"
                                                alt=""></a>
                                    </li>
                                    <li><a href="#"><img
                                                src="{{ asset('') }}assets-berita/img/post/instra6.jpg"
                                                alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-lg-6">
                            <div class="footer-copy-right">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i
                                        class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                        target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-menu f-right">
                                <ul>
                                    <li><a href="#">Terms of use</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('') }}assets-berita/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('') }}assets-berita/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('') }}assets-berita/js/popper.min.js"></script>
    <script src="{{ asset('') }}assets-berita/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('') }}assets-berita/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('') }}assets-berita/js/owl.carousel.min.js"></script>
    <script src="{{ asset('') }}assets-berita/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="{{ asset('') }}assets-berita/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('') }}assets-berita/js/wow.min.js"></script>
    <script src="{{ asset('') }}assets-berita/js/animated.headline.js"></script>
    <script src="{{ asset('') }}assets-berita/js/jquery.magnific-popup.js"></script>

    <!-- Breaking New Pluging -->
    <script src="{{ asset('') }}assets-berita/js/jquery.ticker.js"></script>
    <script src="{{ asset('') }}assets-berita/js/site.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('') }}assets-berita/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('') }}assets-berita/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('') }}assets-berita/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="{{ asset('') }}assets-berita/js/contact.js"></script>
    <script src="{{ asset('') }}assets-berita/js/jquery.form.js"></script>
    <script src="{{ asset('') }}assets-berita/js/jquery.validate.min.js"></script>
    <script src="{{ asset('') }}assets-berita/js/mail-script.js"></script>
    <script src="{{ asset('') }}assets-berita/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('') }}assets-berita/js/plugins.js"></script>
    <script src="{{ asset('') }}assets-berita/js/main.js"></script>

</body>

</html>