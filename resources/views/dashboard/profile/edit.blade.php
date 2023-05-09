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
{{ __('Edit') }}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <br>
                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{ route('admin.profile.update') }}" method="post">
                    @csrf
                    <div class="">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label>{{ __('Name_en') }} : <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-md mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" value="{{ $user->name_en }}" name="name_en"
                                    required="" type="text">
                            </div>
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label>{{ __('Name_ar') }} : <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-md mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" value="{{ $user->name_ar }}" name="name_ar"
                                    required="" type="text">
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>{{ __('E-mail') }} : <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-md mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" value="{{ $user->email }}" name="email"
                                    required="" type="email">
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>{{ __('Mobile') }} : <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-md mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" value="{{ $user->phone }}" name="phone"
                                    required="" type="text">
                            </div>

                        </div>
                        <div class="row mg-b-20">
                        </div>
                    </div>
                    <div class="mg-t-30">
                        <button class="btn btn-main-primary pd-x-20"
                            type="submit">{{ __('Edit') }}</button>
                        <a class="btn btn-secondary" data-effect="effect-scale" style="font-weight: bold; color: beige;"
                            href="{{ route('admin.dashboard.index') }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
