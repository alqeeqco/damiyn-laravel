@extends('dashboard.include.master')

@section('title')
{{ __('Teams') }}
@endsection
@section('titlecontent')
{{ __('Dashboard') }}
@endsection
@section('titlelinkcontent')
<a href="{{ route('admin.teams.index') }}">{{ __('Teams') }}</a>
@endsection
@section('titleparhcontent')
{{ __('Add') }}
@endsection
@section('content')

    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
               <form action="{{ route('admin.teams.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""> {{ __('Name') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            @error('name')
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
                                <option @if (old('active') == 2 and old('active') != '') selected="selected" @endif value="2"> No</option>
                            </select>

                            @error('active')
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
                </div>

                <div class="text-center">
                    <button class="btn btn-success pd-x-30 mg-r-5 mg-t-5">{{ __('Add') }}</button>
                    <a href="{{ route('admin.teams.index') }}" class="btn btn-dark pd-x-30 mg-t-5">{{ __('Cancel') }}</a>
                </div>
               </form>
            </div>
        </div>
    </div>

@endsection
