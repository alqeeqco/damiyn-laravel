<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link href="{{ asset('webassets/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('webassets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('webassets/plugins/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('webassets/plugins/slick/slick-theme.css') }}" rel="stylesheet">

    <link href="{{ asset('webassets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('webassets/css/style.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light navigation">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{ asset('webassets/images/logo.png') }}" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav  ">
                                <li class="nav-item links ">
                                    <a class="nav-link" href="index.html">الرئيسية</a>
                                </li>
                                <li class="nav-item links active">
                                    <a class="nav-link" href="index.html" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-bs-whatever="@mdo">طلب جديد</a>
                                </li>
                                <li class="nav-item links ">
                                    <a class="nav-link" href="index.html">من نحن</a>
                                </li>
                                <li class="nav-item links ">
                                    <a class="nav-link" href="index.html">المقالات</a>
                                </li>

                            </ul>
                            <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="login.html">تسجيل دخول</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  add-button" href="register.html"> حساب جديد </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>


        <main class="py-4">
            @yield('content')
        </main>


    </div>

    @include('site.footer')
</body>

</html>
