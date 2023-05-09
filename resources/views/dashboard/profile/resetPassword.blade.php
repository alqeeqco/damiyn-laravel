@extends('dashboard.include.master')

@section('title')
{{ __('Profile') }}
@endsection
@section('titlecontent')
{{ __('Dashboard') }}
@endsection
@section('titlelinkcontent')
<a href="{{ route('admin.profile.edit') }}">{{ __('Profile') }}</a>
@endsection
@section('titleparhcontent')

{{ __('ResetPassword') }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('adminassets/scss/plugins/_dataTables.bootstrap5.scss') }}">
    <link rel="stylesheet" href="{{ asset('adminassets/scss/plugins/_buttons.bootstrap5.scss') }}">
    <link rel="stylesheet" href="{{ asset('adminassets/scss/plugins/_responsive.bootstrap5.scss') }}">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        @include('auth.alert.error')
        @include('auth.alert.success')
        <div class="card">
            <div class="card-body">
                <br>
                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{ route('admin.admin.resetPassword') }}" method="post">
                    @csrf
                    <div class="">
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-12 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>{{ __('Old Password') }} : <span class="tx-danger">*</span></label>
                                <input class="form-control mg-b-20" data-parsley-class-handler="#lnWrapper"
                                    name="old_password" type="password">
                            </div>
                        </div>

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>{{ __('New Password') }} : <span class="tx-danger">*</span></label>
                                <input class="form-control mg-b-20" data-parsley-class-handler="#lnWrapper"
                                    name="new_password" type="password">
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{ __('Password Confirmation') }} : <span class="tx-danger">*</span></label>
                                <input class="form-control mg-b-20" data-parsley-class-handler="#lnWrapper"
                                    name="confirm_password" type="password">
                            </div>
                        </div>

                        <div class="mg-t-30">
                            <button class="btn btn-main-primary pd-x-20" type="submit">{{ __('Edit') }}</button>
                            <a class="btn btn-secondary" data-effect="effect-scale"
                                style="font-weight: bold; color: beige;" href="{{ route('admin.dashboard.index') }}">{{ __('Cancel') }}</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
