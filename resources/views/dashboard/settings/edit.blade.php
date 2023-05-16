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
{{ __('Edit') }}
@endsection
@section('content')

    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.settings.update', $data['id']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> {{ __('Video') }}</label>
                                <input type="text" name="video"  class="form-control"
                                    value="{{ old('video', $data['video']) }}">
                                    @error('video')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Video Title_en') }}</label>
                                <input type="text" name="title_video_en" value="{{ old('title_video_en',$data['title_video_en']) }}" class="form-control">
                                @error('title_video_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Video Title_ar') }}</label>
                                <input type="text" name="title_video_ar" value="{{ old('title_video_ar',$data['title_video_ar']) }}" class="form-control">
                                @error('title_video_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Video Content_en') }}</label>
                                <input type="text" name="content_video_en" value="{{ old('content_video_en',$data['content_video_en']) }}" class="form-control">
                                @error('content_video_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Video Content_ar') }}</label>
                                <input type="text" name="content_video_ar" value="{{ old('content_video_ar',$data['content_video_ar']) }}" class="form-control">
                                @error('content_video_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Gallary Title_en') }}</label>
                                <input type="text" name="title_gallary_en" value="{{ old('title_gallary_en',$data['title_gallary_en']) }}"  class="form-control">
                                @error('title_gallary_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Gallary Title_ar') }}</label>
                                <input type="text" name="title_gallary_ar" value="{{ old('title_gallary_ar',$data['title_gallary_ar']) }}"  class="form-control">
                                @error('title_gallary_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> {{ __('Gallary Content_en') }}</label>
                                <input type="text" name="content_gallary_ar" value="{{ old('content_gallary_ar',$data['content_gallary_ar']) }}"  class="form-control">
                                @error('content_gallary_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> {{ __('Gallary Content_ar') }}</label>
                                <input type="text" name="content_gallary_en" value="{{ old('content_gallary_en',$data['content_gallary_en']) }}"  class="form-control">
                                @error('content_gallary_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Privacy Policy_en') }}</label>
                                <textarea name="privacy_policy_en" id="privacy_policy_en" cols="10" rows="4" class="form-control">{{ old('privacy_policy_en',$data['privacy_policy_en']) }}</textarea>
                                @error('privacy_policy_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Privacy Policy_ar') }}</label>
                                <textarea name="privacy_policy_ar" id="privacy_policy_ar" cols="10" rows="4" class="form-control">{{ old('privacy_policy_ar',$data['privacy_policy_ar']) }}</textarea>
                                @error('privacy_policy_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Terms and Conditions_en') }}</label>
                                <textarea name="Terms_and_Conditions_en" id="Terms_and_Conditions_en" cols="30" rows="4" class="form-control">{{ old('Terms_and_Conditions_en',$data['Terms_and_Conditions_en']) }}</textarea>
                                @error('Terms_and_Conditions_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Terms and Conditions_ar') }}</label>
                                <textarea name="Terms_and_Conditions_ar" id="Terms_and_Conditions_ar" cols="30" rows="4" class="form-control">{{ old('Terms_and_Conditions_ar',$data['Terms_and_Conditions_ar']) }}</textarea>
                                @error('Terms_and_Conditions_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-sm-12 col-md-8 mg-t-10 mg-md-t-0">
                                <input type="file" name="logo_header" class="dropify" data-default-file="{{ asset('uploads/settings/'.$data['logo_header'] ) }}" data-height="200">
                                @error('logo_header')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-sm-12 col-md-8 mg-t-10 mg-md-t-0">
                                <input type="file" name="logo_footer" class="dropify" data-default-file="{{ asset('uploads/settings/'.$data['logo_footer'] ) }}" data-height="200">
                                @error('logo_footer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>


                            <div class="col-md-12 mt-5">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5 " > {{ __('Edit') }}</button>
                                    <a href="{{ route('admin.settings.index') }}"  class="btn btn-dark pd-x-30 mg-t-5"> {{ __('Cancel') }}</a>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
