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
                        <a class="navbar-brand img_home" href="{{ route('homeIndex') }}">
                            @foreach (\App\Models\Setting::limit(1)->get() as $logo)
                                <img src="{{ asset('uploads/settings/' . $logo->logo_header) }}" class="logo_site" alt="">
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
                                    <a class="nav-link login-button" href="{{ route('login.site') }}">تسجيل دخول</a>
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

    <section class="hero-area bg-1 text-center ">
        <div class="slider">
            <div class="slide_viewer">
                <div class="slide_group">
                    @foreach (\App\Models\Slider::where('active', 1)->limit(2)->orderby('id', 'DESC')->get() as $info)
                        <div class="slide">
                            <img src="{{ asset('uploads/sliders/' . $info->slider) }}" />
                        </div>
                    @endforeach

                </div>
            </div>
        </div><!-- End // .slider -->

        <div class="slide_buttons">
        </div>
    </section>


    <!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
    <div class="container">
        <div class="row">
            @foreach (\App\Models\Feature::where('active',1)->get() as $feature )
            <div class="col-md-4" style="overflow: hidden">
                <div data-aos="fade-right">
                    <div class="card task1 ">
                        <div class="card-body padding-card">
                            <div>
                                <img width="50" src="{{ asset('uploads/feature/'.$feature->image) }}" alt="">
                                <h5> {{ $feature->$title_feature}}</h5>
                                <p  class="p_feature">  {!! Str::words($feature->$content_feature, 27, '...') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>

    </div>

</section>



    <!--==========================================
=            All Category Section            =
===========================================-->

    <section class=" section">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body card-video">
                                    @foreach (\App\Models\Setting::limit(1)->get() as $setting)
                                        <a target="_blank"  href="{{ $setting->video }}" class="video-play-button">
                                            <span></span>
                                        </a>

                                        <div id="video-overlay" class="video-overlay">
                                            <a class="video-overlay-close">&times;</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="allows col-md-5">
                    <div data-aos="zoom-out-left">
                        @foreach (\App\Models\Setting::limit(1)->get() as $setting)
                            <div class="card-body">
                                <div class="image_bg">
                                    <img width="40" src="{{ asset('webassets/images/blog/Group 99.png') }}"
                                        alt="">
                                </div>
                                <div class="about">
                                    <h5><span class="new">ضمين</span>,{{ $setting->$title_video }}</h5>
                                    <p class="p_feature">{{ $setting->$content_video }}</p>
                                    </p>
                                    <button class="buttons" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        data-bs-whatever="@mdo">طلب جديد</button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
        <!-- Container End -->
    </section>

    <section class="section">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                @foreach (\App\Models\Setting::orderby('id', 'DESC')->limit(1)->get() as $gallary)
                    <div class="col-md-4 abouts task2">
                        <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                            <div class="image_bg">
                                <img width="40" src="{{ asset('webassets/images/blog/_Compound Path_.png') }}"
                                    alt="">
                            </div>
                            <div class="about1">
                                <h5><span class="new">ضمين</span>, {{ $gallary->$title_gallary }}</h5>
                                <p class="p_feature">{{ $gallary->$content_gallary }}</p>
                                <button class="buttons" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-whatever="@mdo">طلب جديد</button>
                            </div>
                            <div class="test">
                                <img class="path" src="{{ asset('webassets/images/blog/path.png') }}"
                                    alt="">
                            </div>
                        </div>

                    </div>
                @endforeach
                <div class="col-md-4">
                    <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                        <img class="image-card1" src="{{ asset('webassets/images/blog/Group 105.png') }}"
                            alt="">

                    </div>
                </div>
                <div class="col-md-4 ">
                    <div data-aos="zoom-out-down">
                        <img class="image-card image-card2" src="{{ asset('webassets/images/blog/Group 106.png') }}"
                            alt="">
                    </div>

                    <div data-aos="zoom-out-left">
                        <img class="mt-3 image-card3" src="{{ asset('webassets/images/blog/Group 107.png') }}"
                            alt="">
                    </div>

                </div>


            </div>
        </div>
    </section>

    <section class="section">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
				<div class="col-md-12 abouts ">
					<div class="image_bg">
						<img width="60" src="{{ asset('webassets/images/blog/Group 100.png') }}" alt="">
					</div>
					<div class="about2 ">
						<h5>ماذا قالو عن <span class="new">ضمين</span></h5>
                        @if ((\App\Models\Review::where('active',1)->first()))
                        <p class="p_feature">ماذا قال عنا عملاؤنا وعن خدمات ضمين ...</p>
                        @endif

					</div>
				</div>
			</div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">

				@foreach (\App\Models\Review::where('active',1)->orderby('id','DESC')->limit(6)->get() as $review )
                <div class="col">
					<div data-aos="zoom-in-right">
						<div class="card h-100">
							<div class="card-body backgroud-text">
								<p class="card-text">“ {{ $review->$message }}”</p>
							</div>
							<div class="card-footer backgroud-text-footer">
								<small class="text-body-secondary">{{ $review->$name }}</small>
							</div>
						</div>
					</div>

				</div>
                @endforeach
			</div>
        </div>
    </section>

    <section class="section">
        <!-- Container Start -->

        <img class="path2" src="{{ asset('webassets/images/blog/_Path_.png') }}" alt="">

        <div class="container">
            <div class="row">
                <div class="col-md-12 abouts">
                    <div class="about2">
						<h5>شركاء ضمين</h5>
						@if ((\App\Models\Team::where('active',1)->first()))
                        <p class="p_feature">شركاء نجاح ضمين دائما وأبدا...</p>

                        @endif


					</div>
                </div>
            </div>
            <div class="grid text-center d-flex">
				@foreach ( \App\Models\Team::where('active',1)->orderby('id','DESC')->limit(6)->get() as $review )
                <div class="total" style="overflow: hidden;">
                    <img style="max-width: 100%;" src="{{ asset('uploads/team/'.$review->image) }}" alt="">
                </div>
                @endforeach

			</div>
            <div class="grid text-center mt-2 d-flex justify-content-center">
				@foreach ( \App\Models\Team::where('active',1)->orderby('id','DESC')->limit(2)->offset(5)->get() as $review )
                <div class="total" style="overflow: hidden;">
                    <img  src="{{ asset('uploads/team/'.$review->image) }}" alt="">
                </div>
                @endforeach


			</div>
        </div>
    </section>


    <footer class="footer section section-sm">
        <!-- Container Start -->
        <div class="container">
            <div class="row" style="justify-content: end;">


                <div class="col-md-9 col-footer">
                    <ul class=" list-footer">
                        <li class="nav-item li-text with-footer-link " style="width: 150px">
                            <a class="nav-link text-white" href="index.html" data-bs-toggle="modal"
                                data-bs-target="#exampleModal1">الشروط والاحكام</a>
                        </li>
                        <li class="nav-item li-text with-footer-link " style="width: 150px;">
                            <a class="nav-link text-white" href="index.html" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2"> سياسة الخصوصية</a>
                        </li>
                        <li class="nav-item li-text with-footer-link">
                            <a class="nav-link" href="{{ route('site.login') }}">المقالات</a>
                        </li>
                        <li class="nav-item li-text with-footer-link">
                            <a class="nav-link action" href="#">من نحن</a>
                        </li>
                        <li class="nav-item li-text bg-active with-footer-link">
                            <a class="nav-link" href="index.html" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-whatever="@mdo">طلب جديد</a>
                        </li>
                        <li class="nav-item li-text">
                            <a class="nav-link" href="{{ route('homeIndex') }}">الرئيسية</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 icon-footer col-footer-image">
                    @foreach (\App\Models\Setting::limit(1)->get() as $logo)
                        <img class="img-footer" src="{{ asset('uploads/settings/' . $logo->logo_footer) }}" alt="">
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
                            <script></script>جميع الحقوق محفوظة لدى <a class="text-white" href="#">ضمين
                                @2023</a>
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
                    <form>
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
                    </form>
                </div>
                <div class="modal-footer" style="border: 0;">
                    <a href="{{ route('login') }}" class="btn btn-send w-100">ارسال </a>
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
                            src="{{ asset('webassets/images/blog/close-circle.svg') }}" alt=""></button>
                </div>
                <div class="modal-body modal-body-edit">
                    <h5> الشروط والأحكام</h5>
                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                        حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                        التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما
                        تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه
                        الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.</p>
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
                    <h5> سياسة الخصوصية</h5>
                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                        حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                        التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما
                        تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه
                        الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.</p>
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

    <script>
        AOS.init();
    </script>
</body>

</html>
