<!DOCTYPE html>
@php
    $title_feature = 'title_' . app()->currentLocale();
    $title_video = 'title_video_' . app()->currentLocale();
    $name = 'name_' . app()->currentLocale();
    $title_gallary = 'title_gallary_' . app()->currentLocale();
    $content_feature = 'content_' . app()->currentLocale();
    $content_video = 'content_video_' . app()->currentLocale();
    $content_gallary = 'content_gallary_' . app()->currentLocale();
    $message = 'message_' . app()->currentLocale();
    $privacy_policy = 'privacy_policy_' . app()->currentLocale();
    $Terms_and_Conditions = 'Terms_and_Conditions_' . app()->currentLocale();

@endphp
<html lang="en">

<head>

    <!-- ** Basic Page Needs ** -->
    <meta charset="utf-8">
    <title>projects</title>

    <!-- ** Mobile Specific Metas ** -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Agency HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Classified Marketplace Template v1.0">

    <!-- theme meta -->
    <meta name="theme-name" content="classimax" />

    <!-- favicon -->
    <link href="images/favicon.png" rel="shortcut icon">

    <!--
  Essential stylesheets
  =====================================-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link href="{{ asset('webassets/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('webassets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('webassets/plugins/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('webassets/plugins/slick/slick-theme.css') }}" rel="stylesheet">

    <link href="{{ asset('webassets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('webassets/fonts/Montserrat-Arabic Bold 700.otf') }}">
    <link href="{{ asset('webassets/css/style.css') }}" rel="stylesheet">

</head>

<body class="body-wrapper">


    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light navigation">
                        <a class="navbar-brand" href="{{ route('homeIndex') }}">
                            @foreach (\App\Models\Setting::where('active', 1)->limit(1)->get() as $logo)
                                <img src="{{ asset('uploads/settings/' . $logo->logo_header) }}" alt="">
                            @endforeach
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav  ">
                                <li class="nav-item links ">
                                    <a class="nav-link" href="{{ route('homeIndex') }}">الرئيسية</a>
                                </li>
                                <li class="nav-item links active">
                                    <a class="nav-link" href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-bs-whatever="@mdo">طلب جديد</a>
                                </li>
                                <li class="nav-item links ">
                                    <a class="nav-link" href="{{ route('site.login') }}">من نحن</a>
                                </li>
                                <li class="nav-item links ">
                                    <a class="nav-link" href="{{ route('site.login') }}">المقالات</a>
                                </li>

                            </ul>
                            <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="{{ route('site.login') }}">تسجيل دخول</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  add-button" href="{{ route('site.register') }}"> حساب جديد </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!--===============================
=            Hero Area            =
================================-->



    <!--===========================================
=            Popular deals section            =
============================================-->

    <section class="popular-deals section1 section bg-gray">
        <div class="container">
            <div class="row justify-content-center align-items-center row-height">
                <div class="col-md-7 ">
                    <div class="card card-background col-height">
                        <div class="card-title login-title">
                            @include('auth.alert.error')
                            @include('auth.alert.success')
                            <h4 class="login-header">تسجيل دخول</h4>
                            <p class="login-par">أدخل رقم الجوال لتسجيل الدخول</p>
                        </div>
                        <div class="card-body pt-0">
                            <form action="{{ route('site.login') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="label-text1">رقم الجوال</label>
                                    <input type="text" name="phone" placeholder="رقم الجوال"
                                        class="form-control input-border">
                                </div>
                                <div>
                                    <button class="buttton-login w-100">تسجيل دخول</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center footer-bg">
                            <p class="card-footer-p"> ليس لدي حساب؟ <a href="" class="text-blue">إنشاء حساب</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>











    <footer class="footer section section-sm">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-footer">
                    <ul class=" ">
                        <li class="nav-item ">
                            <a class="nav-link text-white" href="index.html" data-bs-toggle="modal"
                                data-bs-target="#exampleModal1">الشروط والاحكام</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white" href="index.html" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2"> سياسة الخصوصية</a>
                        </li>
                        </li>

                    </ul>
                </div>

                <div class="col-md-6 col-footer">
                    <ul class=" list-footer">
                        <li class="nav-item li-text with-footer-link">
                            <a class="nav-link" href="{{ route('site.login') }}">المقالات</a>
                        </li>
                        <li class="nav-item li-text with-footer-link">
                            <a class="nav-link action" href="{{ route('site.login') }}">من نحن</a>
                        </li>
                        <li class="nav-item li-text bg-active with-footer-link">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-bs-whatever="@mdo">طلب جديد</a>
                        </li>
                        <li class="nav-item li-text">
                            <a class="nav-link" href="{{ route('homeIndex') }}">الرئيسية</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 icon-footer col-footer-image">
                    @foreach (\App\Models\Setting::where('active', 1)->limit(1)->get() as $logo)
                        <img src="{{ asset('uploads/settings/' . $logo->logo_footer) }}" alt="">
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Container End -->
    </footer>
    <footer class="footer-bottom">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- Copyright -->
                    <div class="copyright">
                        <p>
                            <script></script>جميع الحقوق محفوظة لدى <a class="text-white"
                                href="https://themefisher.com">شركة القيق @2023</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
        <!-- To Top -->
        <div class="scroll-top-to" style="display: block;">
            <i class="fa fa-angle-up"></i>
        </div>
    </footer>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-block modal-header-edit " style="border: 0;">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">طلب جديد </h1>
                    <p>أدخل رقم البائع ونوع وتفاصيل الطلب</p>
                </div>
                <div class="modal-body">
                    <form action="{{ route('site.login') }}">
                        <div class="form-group label-right mb-3">
                            <label>رقم واتس البائع</label>
                            <input type="text" class="form-control" name="phone" placeholder="رقم واتس البائع"
                                id="recipient-name">
                        </div>
                        <div class="form-group label-right mb-3">
                            <label>نوع الطلب</label><br>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>إختر نوع الطلب</option>
                                <option value="1">منتج</option>
                                <option value="2">خدمة</option>
                            </select>
                        </div>
                        <div class="form-group label-right mb-3">
                            <label>تفاصيل الطلب</label>
                            <textarea class="form-control" id="message-text">تفاصيل الطلب</textarea>
                        </div>
                        <div class="modal-footer" style="border: 0;">
                            <button type="submit" class="btn btn-send w-100">ارسال </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-edit1">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                            src="assets/images/blog/close-circle.svg" alt=""></button>
                </div>
                <div class="modal-body modal-body-edit">
                    @foreach (\App\Models\Setting::where('active', 1)->limit(1)->get() as $Setting)
                        <h5>{{ __('Terms and Conditions') }}</h5>
                        <p>{{ $Setting->$Terms_and_Conditions }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-edit1">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                            src="assets/images/blog/close-circle.svg" alt=""></button>
                </div>
                <div class="modal-body modal-body-edit">
                    @foreach (\App\Models\Setting::where('active', 1)->limit(1)->get() as $Setting)
                        <h5> {{ __('Privacy Policy') }}</h5>
                        <p>{{ $Setting->$privacy_policy }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <!--
Essential Scripts
=====================================-->
    <script src="{{ asset('webassets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('webassets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('webassets/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('webassets/plugins/bootstrap/bootstrap-slider.js') }}"></script>
    <script src="{{ asset('webassets/plugins/tether/js/tether.min.js') }}"></script>
    <script src="{{ asset('webassets/plugins/raty/jquery.raty-fa.js') }}"></script>
    <script src="{{ asset('webassets/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('webassets/plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
    <script src="{{ asset('webassets/plugins/google-map/map.js') }}" defer></script>
    <script src="{{ asset('webassets/js/script.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

</body>

</html>
