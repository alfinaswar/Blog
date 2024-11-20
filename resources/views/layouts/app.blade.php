<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Digital Indonesia Hebat">
    <meta name="keywords" content="Sistem Kalibrasi Alat Medis By PT. Digital Indonesia Hebat">
    <meta name="description" content="Sistem Kalibrasi Alat Medis Terbaik Di indonesia yang berkantor di kota pekanbaru">
    <meta property="og:title" content="Sistem Kalibrasi Alat Medis By Digital Indonesia Hebat">
    <meta property="og:description"
        content="Sistem Kalibrasi Alat Medis Terbaik Di indonesia yang berkantor di kota pekanbaru">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title -->
    <title>Blog Post</title>

    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Favicon icon -->
    <link rel="assets/shortcut icon" type="image/png" href="images/favicon.png">

    <!-- All StyleSheet -->
    <link href="{{ asset('') }}assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">

    <!-- Globle CSS -->

    <!-- Datatable -->
    <link href="{{ asset('') }}assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('') }}assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

    <link href="{{ asset('') }}assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/css/custom.css" rel="stylesheet">
    <script src="{{ asset('') }}assets/vendor/peity/jquery.peity.min.js"></script>
    <script src="{{ asset('') }}assets/js/plugins-init/piety-init.js"></script>
    <script src="{{ asset('') }}assets/js/plugins-init/widgets-script-init.js"></script>
    {{-- Select 2 --}}
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/select2/css/select2.min.css">

    <link href="{{ asset('') }}assets/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="{{ asset('') }}assets/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{ asset('') }}assets/vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link
        href="{{ asset('') }}assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet">

    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/pickadate/themes/default.date.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ route('home') }}" class="brand-logo">
                <img src="{{ asset('assets/images/logo/circle-logo.png') }}" class="logo-abbr">
                <img src="{{ asset('assets/images/logo/main-logo.png') }}" class="brand-title" height="100%">


            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Dashboard
                            </div>

                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="{{ asset('assets/images/profile/2.jpg') }}" width="20"
                                        alt="">
                                </a>
                                <!-- resources/views/partials/navbar.blade.php -->

                                <div class="dropdown-menu dropdown-menu-end">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" class="dropdown-item ai-icon"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12">
                                            </line>
                                        </svg>
                                        <span class="ms-2">Logout</span>
                                    </a>
                                </div>

                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <div class="dropdown header-profile2 ">
                    <a class="nav-link " href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                        <div class="header-info2 d-flex align-items-center">
                            <img src="{{ asset('') }}assets/images/profile/pic1.jpg" alt="">
                            <div class="d-flex align-items-center sidebar-info">
                                <div>
                                    <span class="font-w400 d-block">{{ auth()->user()->name }}</span>
                                    <small class="text-end font-w400">{{ auth()->user()->role }}</small>
                                </div>

                            </div>

                        </div>
                    </a>

                </div>
                <ul class="metismenu" id="menu">
                    <li class="{{ Request::segment(1) == 'home' ? 'active' : '' }}">
                        <a class="" href="{{ route('home') }}" aria-expanded="true">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('post.index') }}">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Berita / Postingan</span>
                        </a>
                    </li>

                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-093-waving"></i>
                            <span class="nav-text">Master</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class="{{ Request::segment(1) == 'users' ? 'active' : '' }}"><a
                                    href="{{ route('users.index') }}">
                                    Manajemen User</a></li>

                            <li class="{{ Request::segment(1) == 'kategori' ? 'active' : '' }}"><a
                                    href="{{ route('kategori.index') }}">Data Kategori</a></li>


                        </ul>
                    </li>

                </ul>

            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Website Blog Berita Terbaik</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <!-- Modal -->

</body>

<!--**********************************
 Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('') }}assets/vendor/global/global.min.js"></script>
<script src="{{ asset('') }}assets/vendor/chartjs/chart.bundle.min.js"></script>
<!-- Apex Chart -->
<script src="{{ asset('') }}assets/vendor/apexchart/apexchart.js"></script>

<!-- Datatable -->
<script src="{{ asset('') }}assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}assets/js/plugins-init/datatables.init.js"></script>

<script src="{{ asset('') }}assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<script src="{{ asset('') }}assets/js/custom.min.js"></script>
<script src="{{ asset('') }}assets/js/dlabnav-init.js"></script>
{{-- select 2 --}}
<script src="{{ asset('') }}assets/vendor/select2/js/select2.full.min.js"></script>
<script src="{{ asset('') }}assets/js/plugins-init/select2-init.js"></script>

<!-- Daterangepicker -->
<!-- momment js is must -->
<script src="{{ asset('') }}assets/vendor/moment/moment.min.js"></script>
<script src="{{ asset('') }}assets/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- clockpicker -->
<script src="{{ asset('') }}assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<!-- asColorPicker -->
<script src="{{ asset('') }}assets/vendor/jquery-asColor/jquery-asColor.min.js"></script>
<script src="{{ asset('') }}assets/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
<script src="{{ asset('') }}assets/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
<!-- Material color picker -->
<script
    src="{{ asset('') }}assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
</script>
<script src="{{ asset('') }}assets/vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>
<!-- pickdate -->
<script src="{{ asset('') }}assets/vendor/pickadate/picker.js"></script>
<script src="{{ asset('') }}assets/vendor/pickadate/picker.time.js"></script>
<script src="{{ asset('') }}assets/vendor/pickadate/picker.date.js"></script>


<!-- Daterangepicker -->
<script src="{{ asset('') }}assets/js/plugins-init/bs-daterange-picker-init.js"></script>
<!-- Clockpicker init -->
<script src="{{ asset('') }}assets/js/plugins-init/clock-picker-init.js"></script>
<!-- asColorPicker init -->
<script src="{{ asset('') }}assets/js/plugins-init/jquery-asColorPicker.init.js"></script>
<!-- Material color picker init -->
<script src="{{ asset('') }}assets/js/plugins-init/material-date-picker-init.js"></script>
<!-- Pickdate -->
<script src="{{ asset('') }}assets/js/plugins-init/pickadate-init.js"></script>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('') }}assets/js/dashboard/dashboard-1.js"></script>

</body>

<script>
    $(".form_datetime").datepicker({
        format: 'yyyy-mm-dd'
    });
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.9.1/tinymce.min.js"
    integrity="sha512-wL4f713UTdXFhzoGj57R7cKAwWMp48nzQ4Z/OLy7r8Hrqsa53x3y9Wl1N27hNktcmmHUABHuIX5xQazAl0VMRg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    tinymce.init({
        selector: '.tinymce',
        height: 300,
        plugins: 'lists link table code',
        toolbar: 'undo redo | bold italic | fontsizeselect fontselect | numlist bullist | outdent indent | link | code | alignleft aligncenter alignright',
    });
</script>
@stack('scripts')
