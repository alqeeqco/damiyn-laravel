<!DOCTYPE html>
@php
    $privacy_policy = 'privacy_policy_'.app()->currentLocale();
    $Terms_and_Conditions = 'Terms_and_Conditions_'.app()->currentLocale();
@endphp
<html lang="en">

<head>

    <!-- ** Basic Page Needs ** -->
    <meta charset="utf-8">
    <title>@yield('title',env('APP_NAME'))</title>

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
    <link href="{{ asset('webassets/css/style.css') }}" rel="stylesheet">
        @section('css')
</head>

<body class="body-wrapper">


    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('site.navbar')
                </div>
            </div>
        </div>
    </header>

    <!--===============================
=            Hero Area            =
================================-->

   @yield('content')


  @include('site.footer')

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

    <script>
        AOS.init();
    </script>
    @yield('script')
</body>

</html>
