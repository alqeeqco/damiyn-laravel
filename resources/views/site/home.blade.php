@extends('site.master')
@section('title','Home')
@php
    $title_feature= 'title_'.app()->currentLocale();
    $title_video = 'title_video_'.app()->currentLocale();
    $name= 'name_'.app()->currentLocale();
    $title_gallary = 'title_gallary_'.app()->currentLocale();
    $content_feature = 'content_'.app()->currentLocale();
    $content_video = 'content_video_'.app()->currentLocale();
    $content_gallary = 'content_gallary_'.app()->currentLocale();
    $message = 'message_'.app()->currentLocale();
    $privacy_policy = 'privacy_policy_'.app()->currentLocale();
    $Terms_and_Conditions = 'Terms_and_Conditions_'.app()->currentLocale();


@endphp
@section('content')

	<section class="hero-area bg-1 text-center ">
		<div class="slider">
			<div class="slide_viewer">

                <div class="slide_group text">
                    @foreach (\App\Models\Slider::where('active',1)->limit(2)->orderby('id','DESC')->get() as $info )
					<div class="slide">
                        <img class="slider-img" src="{{ asset('uploads/sliders/' . $info->slider) }}" />
					</div>
                    @endforeach

				</div>
			</div>
		</div><!-- End // .slider -->

		{{-- <div class="slide_buttons">
		</div> --}}
	</section>


	<!--===========================================
=            Popular deals section            =
============================================-->

	<section class="popular-deals section bg-gray">
		<div class="container">
			<div class="row">
                @foreach (\App\Models\Feature::where('active',1)->get() as $feature )
                <div class="col-md-4 mt-3" style="overflow: hidden">
					<div data-aos="fade-right">
						<div class="card task1 ">
							<div class="card-body padding-card">
								<div>
									<img width="50" src="{{ asset('uploads/feature/'.$feature->image) }}" alt="">
									<h5> {{ $feature->$title_feature}}</h5>
									<p class="p_feature">  {!! Str::words($feature->$content_feature, 20, '...') !!}</p>
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
						<div class="card padding-video">
							<div class="card-body card-video">

                                @foreach (\App\Models\Setting::limit(1)->get() as $setting)
                                <a target="_blank"  href="{{ $setting->video }}"  class="video-play-button">
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
                    <div class="allows col-md-5">
                        <div data-aos="zoom-out-left">
                            <div class="card">
                                @foreach (\App\Models\Setting::limit(1)->get() as $setting)
                                <div class="card-body">
                                    <div class="image_bg">
                                        <img width="40" src="{{ asset('webassets/images/blog/Group 99.png') }}" alt="">
                                    </div>
                                    <div class="about">
                                        <h5><span class="new">ضمين</span>,{{ $setting->$title_video }}</h5>
                                        <p class="p_feature">{{ $setting->$content_video }}</p>
                                        </p>
                                        <button class="buttons" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">طلب جديد</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

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
				@foreach (\App\Models\Setting::orderby('id','DESC')->limit(1)->get() as $gallary)
                <div class="col-md-4 abouts task2">
					<div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
						<div class="image_bg">
							<img width="40" src="{{ asset('webassets/images/blog/_Compound Path_.png') }}" alt="">
						</div>
						<div class="about1">
							<h5><span class="new">ضمين</span>, {{ $gallary->$title_gallary }}</h5>
							<p class="p_feature">{{ $gallary->$content_gallary }}</p>
							<button class="buttons" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">طلب جديد</button>
						</div>
						<div class="test">
							<img class="path" src="{{ asset('webassets/images/blog/path.png') }}" alt="">
						</div>
					</div>

				</div>
                @endforeach
				<div class="col-md-4">
					<div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
						<img class="image-card1" src="{{ asset('webassets/images/blog/Group 105.png') }}" alt="">

					</div>
				</div>
				<div class="col-md-4 ">
					<div data-aos="zoom-out-down">
						 <img class="image-card image-card2" src="{{ asset('webassets/images/blog/Group 106.png') }}" alt="">
					</div>

					<div data-aos="zoom-out-left">
						<img class="mt-3 image-card3" src="{{ asset('webassets/images/blog/Group 107.png') }}" alt="">
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
                <div class="col mt-3">
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

		<img class="path2" src="{{ asset('webassets/images/blog/_Path_.svg') }}" alt="">

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

@endsection




