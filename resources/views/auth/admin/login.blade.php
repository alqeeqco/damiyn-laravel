<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Admin</title>

    <!-- Favicon -->

    @foreach (\App\Models\Setting::limit(1)->get() as $logo)
    <link rel="icon" href="{{ asset('uploads/settings/'.$logo->logo_header) }}" type="image/x-icon">
 @endforeach

    <!-- Icons css -->
    <link href="{{ asset('adminassets/css/icons.css" rel="stylesheet') }}">

    <!-- Bootstrap css -->
    <link id="style" href="{{ asset('adminassets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- style css -->
    <link href="{{ asset('adminassets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('adminassets/css/plugins.css') }}" rel="stylesheet">

    <!--- Animations css-->
    <link href="{{ asset('adminassets/css/animate.css') }}" rel="stylesheet">

</head>

<body class="ltr error-page1 main-body bg-light text-dark error-3 login-img">


    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('adminassets/img/svgicons/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">

        <div class="container-fluid">
            <div class="row no-gutter">
                <!-- The image half -->
                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                    <div class="row wd-100p mx-auto text-center">
                        <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                            <img src="{{ asset('adminassets/img/pngs/Admin.jpg') }}"
                                class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                        </div>
                    </div>
                </div>
                <!-- The content half -->
                <div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
                    <div class="login d-flex align-items-center py-2">
                        <!-- Demo content-->
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                    <div class="card-sigin">
                                        <div class="mb-5 d-flex justify-content-center">
                                            <a href="index.html">
                                                @foreach (\App\Models\Setting::limit(1)->get() as $logo)
                                                <img src="{{ asset('uploads/settings/'.$logo->logo_header) }}" class="sign-favicon-a ht-40" alt="logo">
                                                @endforeach

                                                <img src="{{ asset('adminassets/brand/favicon-white.png') }}"  class="sign-favicon-b ht-40" alt="logo">
                                            </a>
                                            <h1 class="main-logo1 ms-1 me-0 my-auto tx-28 ">ضمين</h1>
                                        </div>
                                        <div class="card-sigin">
                                            <div class="main-signup-header">
                                                @include('auth.alert.error')
                                                @include('auth.alert.success')
                                                <form action="{{ route('login') }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" name="email"
                                                            placeholder="Enter your email" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control"
                                                            name="password" placeholder="Enter your password"
                                                            type="password">
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">Sign
                                                        In</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End -->
                    </div>
                </div><!-- End -->
            </div>
        </div>

    </div>
    <!-- End Page -->

    <!-- JQuery min js -->
    <script src="{{ asset('adminassets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Bundle js -->
    <script src="{{ asset('adminassets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Moment js -->
    <script src="{{ asset('adminassets/plugins/moment/moment.js') }}"></script>

    <!-- P-scroll js -->
    <script src="{{ asset('adminassets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <!-- eva-icons js -->
    <script src="{{ asset('adminassets/js/eva-icons.min.js') }}"></script>

    <!--themecolor js-->
    <script src="{{ asset('adminassets/js/themecolor.js') }}"></script>

    <!-- custom js -->
    <script src="{{ asset('adminassets/js/custom.js') }}"></script>

    <!-- switcher-styles js -->
    <script src="{{ asset('adminassets/js/swither-styles.js') }}"></script>

</body>

</html>
