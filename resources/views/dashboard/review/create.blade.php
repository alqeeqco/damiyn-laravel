@extends('dashboard.include.master')

@section('title')
{{ __('Reviews') }}
@endsection
@section('titlecontent')
{{ __('Dashboard') }}
@endsection
@section('titlelinkcontent')
<a href="{{ route('admin.reviews.index') }}">{{ __('Reviews') }}</a>
@endsection
@section('titleparhcontent')
{{ __('Add') }}
@endsection
@section('content')

    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
               <form action="{{ route('admin.reviews.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('Name_en') }}</label>
                            <input type="text" name="name_en" value="{{ old('name_en') }}"  class="form-control">
                            @error('name_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('Name') }}</label>
                            <input type="text" name="name_ar" value="{{ old('name_ar') }}"  class="form-control">
                            @error('name_ar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">  {{ __('Message_en') }}</label>
                            <textarea name="message_en" id="message_en" cols="10" rows="2"  class="form-control"></textarea>
                            @error('message_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">  {{ __('Message_ar') }}</label>
                            <textarea name="message_ar" id="message_ar" cols="10" rows="2"  class="form-control"></textarea>
                            @error('message_ar')
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
                                <option @if (old('active') == 0 and old('active') != '') selected="selected" @endif value="0"> No</option>
                            </select>
                            @error('active')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-success pd-x-30 mg-r-5 mg-t-5">{{ __('Add') }}</button>
                    <a href="{{ route('admin.reviews.index') }}" class="btn btn-dark pd-x-30 mg-t-5">{{ __('Cancel') }}</a>
                </div>
               </form>
            </div>
        </div>
    </div>

@endsection
