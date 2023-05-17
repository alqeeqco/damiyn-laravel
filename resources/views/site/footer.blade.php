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
                        <a class="nav-link" href="{{ route('site.blogs') }}">المقالات</a>
                    </li>
                    <li class="nav-item li-text with-footer-link">
                        <a class="nav-link action" href="#">من نحن</a>
                    </li>
                    <li class="nav-item li-text bg-active with-footer-link">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="@mdo">طلب جديد</a>
                    </li>
                    <li class="nav-item li-text">
                        <a class="nav-link" href="{{ route('site.home') }}">الرئيسية</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 icon-footer col-footer-image">
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-block modal-header-edit " style="border: 0;">
                <h1 class="modal-title fs-5" id="exampleModalLabel">طلب جديد </h1>
                <p>أدخل رقم البائع ونوع وتفاصيل الطلب</p>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('site.orderStore') }}">
                    @csrf
                    <div class="form-group label-right mb-3">
                        <label>رقم واتس البائع</label>
                        <input type="number" class="form-control" name="mobile_user" placeholder="رقم واتس البائع"
                            id="recipient-name">
                    </div>
                    <div class="form-group label-right mb-3">
                        <label>{{ __('Order Type') }}</label><br>
                        <select name="order_type" id="Order_type" class="form-select"
                            aria-label="Default select example">
                            <option selected>إختر نوع الطلب</option>
                            <option @if (old('order_type') == 1) selected ="selected" @endif value="1"> منتج
                            </option>
                            <option @if (old('order_type') == 0) selected ="selected" @endif value="0"> خدمة
                            </option>
                        </select>
                    </div>
                    <div class="form-group label-right mb-3">
                        <label>تفاصيل الطلب</label>
                        <textarea class="form-control" name="show_order_ar" id="message-text">{{ old('show_order_ar') }}</textarea>

                    </div>
                    <div class="modal-footer" style="border: 0;">
                        <button type="submit" class="btn btn-send w-100">ارسال </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-edit1">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                        src="{{ asset('webassets/images/blog/close-circle.svg') }}" alt=""></button>
            </div>
            <div class="modal-body modal-body-edit">
                @foreach (\App\Models\Setting::limit(1)->get() as $Setting)
                    <h5>{{ __('Terms and Conditions') }}</h5>
                    <p>{{ $Setting->$Terms_and_Conditions }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-edit1">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                        src="{{ asset('webassets/images/blog/close-circle.svg') }}" alt=""></button>
            </div>
            <div class="modal-body modal-body-edit">
                @foreach (\App\Models\Setting::limit(1)->get() as $Setting)
                    <h5> {{ __('Privacy Policy') }}</h5>
                    <p>{{ $Setting->$privacy_policy }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
