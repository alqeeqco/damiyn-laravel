@extends('dashboard.include.master')

@section('title')
{{ __('Feature') }}
@endsection
@section('titlecontent')
{{ __('Dashboard') }}
@endsection
@section('titlelinkcontent')
<a href="{{ route('admin.features.index') }}">{{ __('Feature') }}</a>
@endsection
@section('titleparhcontent')
{{ __('Add') }}
@endsection
@section('content')

    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
               <form action="{{ route('admin.features.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('Title_en') }}</label>
                            <input type="text" name="title_en" value="{{ old('title_en') }}"  class="form-control">
                            @error('title_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('Title_ar') }}</label>
                            <input type="text" name="title_ar" value="{{ old('title_ar') }}"  class="form-control">
                            @error('title_ar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""> {{ __('Content_en') }}</label>
                            <textarea name="content_en" id="content_en" cols="10" rows="1"   class="form-control">{{ old('content_en') }}</textarea>
                            @error('content_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""> {{ __('Content_ar') }}</label>
                            <textarea name="content_ar" id="content_ar" cols="10" rows="1"  class="form-control">{{ old('content_ar') }}</textarea>
                            @error('content_ar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-sm-12 col-md-8 mg-t-10 mg-md-t-0">
                            <input type="file" name="image" class="dropify" data-default-file="{{ asset('adminassets/img/photos/1.jpg') }}" data-height="200">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> {{ __('Active') }} </label>
                            <select name="active" id="active" class="form-control">
                                <option value=""> --select--</option>
                                <option @if (old('active') == 1) selected="selected" @endif value="1"> Yes
                                </option>
                                <option @if (old('active') == 2 and old('active') != '') selected="selected" @endif value="2"> No</option>
                            </select>

                            @error('active')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success pd-x-30 mg-r-5 mg-t-5">{{ __('Add') }}</button>
                    <a herf="{{ route('admin.features.index') }}" class="btn btn-dark pd-x-30 mg-t-5">{{ __('Cancel') }}</a>

                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
