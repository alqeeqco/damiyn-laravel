@extends('site.master')

@section('title','Verification')

@section('content')
<section class="login py-5 border-top-1 " style="direction: rtl;">
	<div class="container">
	  <div class="row justify-content-center">
		<div class="col-lg-5 col-md-8 align-item-center register-bg">
		  <div >
			<h3 class="bg-h3 p-4 text-start">كود التحقق </h3>
			<p class="p-text">أدخل كود التحقق المرسل إلى رقم الجوال
				<br><span class="color-number">{{ auth()->user()->phone }}</span></p>
			<form action="{{ route('site.verfictionStore') }}" method="post">
                @csrf
			  <fieldset class="p-4">
				<div class="row valdaiton">
					<div class="col">
						<input class="form-control mb-3" name="code5" type="text" required="">
					</div>
					<div class="col">
						<input class="form-control mb-3" name="code4" type="text"  required="">
					</div>
					<div class="col">
						<input class="form-control mb-3" name="code3" type="text"  required="">
					</div>
					<div class="col">
						<input class="form-control mb-3" name="code2" type="text"  required="">
					</div>
					<div class="col">
						<input class="form-control mb-3" name="code1" type="text"  required="">
					</div>
				</div>

				<button type="submit" class="w-100 btn btn-primary  mt-3 btn-blue">تحقق </button>
				<div class="text-center mt-0 register-par">
					<p class="parah mt-3">
                        <a class="mt-3 text-primary" id="resendCode"> إعادة ارسال كود تحقق </a>
                        <a class="mt-3 text-primary" id="timer">2:30</a>
					</p>
				</div>
			  </fieldset>
			</form>
		  </div>
		</div>
	  </div>
	</div>
  </section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    let timer = $("#timer");
    let resendCode = $("#resendCode");
    timer.hide();
    resendCode.click(() => {
        resendCode.hide();
        timer.show();
        let m = 2;
        let s = 30;
        var interval = setInterval(function() {
            s--;
            if (m === 0 && s === 0) {
                clearInterval(interval);
                resendCode.show();
                timer.html('2:30');
                timer.hide();
            }
            if (s === 0) {
                s = 60;
                m--;
            }
            timer.html(m + ':' + s);
        }, 1000);
    })
</script>
@endsection
