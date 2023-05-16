@extends('dashboard.include.master')

@section('title')
{{ __('Slider') }}
@endsection
@section('titlecontent')
{{ __('Dashboard') }}
@endsection
@section('titlelinkcontent')
<a href="{{ route('admin.slider.index') }}">{{ __('Slider') }}</a>
@endsection
@section('titleparhcontent')
{{ __('Edit') }}
@endsection
@section('content')

    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
               <form action="{{ route('admin.slider.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""> {{ __('Title_en') }}</label>
                            <input type="text" name="title_en"  value="{{ old('title_en',$data->title_en) }}" class="form-control">
                            @error('title_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""> {{ __('Title_ar') }}</label>
                            <input type="text" name="title_ar"  value="{{ old('title_ar',$data->title_ar) }}" class="form-control">
                            @error('title_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>  {{ __('Active') }}</label>
                            <select name="active" id="active" class="form-control">
                                <option value=""> --select--</option>
                                <option {{  old('active',$data->active) == 1 ?'selected' : ''}}  value="1"> Yes
                                </option>
                                <option {{  old('active',$data->active) == 2 ?'selected' : ''}}  value="2"> No</option>
                            </select>

                            @error('active')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="col-sm-12 col-md-8 mg-t-10 mg-md-t-0">
                        <input type="file" name="slider" class="dropify" data-default-file="{{ asset('uploads/sliders/'.$data->slider ) }}" data-height="200">
                        @error('slider')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">{{ __('Edit') }}</button>
                    <a href="{{ route('admin.slider.index') }}" class="btn btn-dark pd-x-30 mg-t-5">{{ __('Cancel') }}</a>
                </div>
               </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script src="{{ asset('adminassets/js/slider.js') }}"></script>
@endsection
