@extends('dashboard.include.master')

@section('title')
{{ __('Settings') }}
@endsection
@section('titlecontent')
{{ __('Dashboard') }}
@endsection
@section('titlelinkcontent')
<a href="{{ route('admin.settings.index') }}"> {{ __('Settings') }}</a>
@endsection
@section('titleparhcontent')
{{ __('Add') }}
@endsection
@section('content')

    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> {{ __('Video') }}</label>
                                <input type="text" name="video" value="{{ old('video') }}" placeholder="<iframe>...</iframe> " class="form-control">
                                @error('video')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Video Title_en') }}</label>
                                <input type="text" name="title_video_en" value="{{ old('title_video_en') }}" class="form-control">
                                @error('title_video_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Video Title_ar') }}</label>
                                <input type="text" name="title_video_ar" value="{{ old('title_video_ar') }}" class="form-control">
                                @error('title_video_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Video Content_en') }}</label>
                                <input type="text" name="content_video_en" value="{{ old('content_video_en') }}" class="form-control">
                                @error('content_video_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Video Content_ar') }}</label>
                                <input type="text" name="content_video_ar" value="{{ old('content_video_ar') }}" class="form-control">
                                @error('content_video_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Gallary Title_en') }}</label>
                                <input type="text" name="title_gallary_en" value="{{ old('title_gallary_en') }}"  class="form-control">
                                @error('title_gallary_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Gallary Title_ar') }}</label>
                                <input type="text" name="title_gallary_ar" value="{{ old('title_gallary_ar') }}"  class="form-control">
                                @error('title_gallary_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> {{ __('Gallary Content_en') }}</label>
                                <input type="text" name="content_gallary_en" value="{{ old('content_gallary_en') }}"  class="form-control">
                                @error('content_gallary_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> {{ __('Gallary Content_ar') }}</label>
                                <input type="text" name="content_gallary_ar" value="{{ old('content_gallary_ar') }}"  class="form-control">
                                @error('content_gallary_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>  {{ __('Active') }}</label>
                                <select name="active" id="active" class="form-control">
                                    <option value=""> --select--</option>
                                    <option @if (old('active') == 1) selected="selected" @endif value="1"> Yes
                                    </option>
                                    <option @if (old('active') == 0 and old('active') != '') selected="selected" @endif value="0"> No
                                    </option>
                                </select>
                                @error('active')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Privacy Policy_en') }}</label>
                                <textarea name="privacy_policy_en" id="privacy_policy_en" cols="10" rows="4" class="form-control">{{ old('privacy_policy_en') }}</textarea>
                                @error('privacy_policy_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Privacy Policy_ar') }}</label>
                                <textarea name="privacy_policy_ar" id="privacy_policy_ar" cols="10" rows="4" class="form-control">{{ old('privacy_policy_ar') }}</textarea>
                                @error('privacy_policy_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Terms and Conditions_en') }}</label>
                                <textarea name="Terms_and_Conditions_en" id="Terms_and_Conditions_en" cols="30" rows="4" class="form-control">{{ old('Terms_and_Conditions_en') }}</textarea>
                                @error('Terms_and_Conditions_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Terms and Conditions_ar') }}</label>
                                <textarea name="Terms_and_Conditions_ar" id="Terms_and_Conditions_ar" cols="30" rows="4" class="form-control">{{ old('Terms_and_Conditions_ar') }}</textarea>
                                @error('Terms_and_Conditions_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-sm-12 col-md-8 mg-t-10 mg-md-t-0">
                                <input type="file" name="logo_header" class="dropify" data-default-file="../assets/img/photos/1.jpg" data-height="200">
                                @error('logo_header')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-sm-12 col-md-8 mg-t-10 mg-md-t-0">
                                <input type="file" name="logo_footer" class="dropify" data-default-file="../assets/img/photos/1.jpg" data-height="200">
                                @error('logo_footer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-success pd-x-30 mg-r-5 mg-t-5">{{ __('Add') }}</button>
                        <a href="{{ route('admin.settings.index') }}" class="btn btn-dark pd-x-30 mg-t-5">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
