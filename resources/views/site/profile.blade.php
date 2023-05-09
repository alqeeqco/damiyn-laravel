@extends('site.master')

@section('title','Profile')

@section('content')
<section class="login py-5 border-top-1 " style="direction: rtl;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-8 align-item-center register-bg border-ptofile">
                <a class="new-profile" href="{{ route('site.profile.edit') }}">البيانات الشخصية</a>
            </div>
            <div class="col-lg-7 col-md-8 align-item-center border-profile1">
                <div>
                    <form action="{{ route('site.profile.update',$user['id']) }}" method="POST">
                        @csrf
                        <fieldset class="p-4">
                            <div class="class-group text-align-right">
                                <label for="">الإسم</label>
                                <input class="form-control mb-3" name="name_en" value="{{ old('name_en',$user['name_en']) }}" type="text" placeholder="الإسم كامل"
                                    required="">
                            </div>
                            <div class="class-group text-align-right">
                                <label for="">البريد الإلكتروني</label>
                                <input class="form-control mb-3" type="email" name="email" value="{{ old('email',$user['email']) }}" placeholder="البريد الإلكتروني"
                                    required="">
                            </div>
                            <div class="class-group text-align-right">
                                <label for="">رقم الجوال </label>
                                <input class="form-control mb-3" type="text" name="phone" value="{{ old('phone',$user['phone']) }}" placeholder="رقم الجوال "
                                    required="">
                            </div>
                            <button type="submit" class="w-100 btn btn-primary  mt-3 btn-blue"> حفظ
                                التعديلات</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
