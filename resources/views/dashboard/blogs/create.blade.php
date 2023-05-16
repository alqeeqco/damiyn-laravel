@extends('dashboard.include.master')

@section('title')
{{ __('Blogs') }}
@endsection
@section('titlecontent')
{{ __('Dashboard') }}
@endsection
@section('titlelinkcontent')
<a href="{{ route('admin.blogs.index') }}">{{ __('Blogs') }}</a>
@endsection
@section('titleparhcontent')
{{ __('Add') }}
@endsection

@section('content')

    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
               <form action="{{ route('admin.blogs.store') }}" method="post" enctype="multipart/form-data">
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
                            <label for="">{{ __('Slug') }}</label>
                            <input type="text" name="slug" value="{{ old('slug') }}"   class="form-control">
                            @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for=""> {{ __('Content_en') }}</label>
                            <textarea name="content_en"  id="content_en" cols="10" rows="2"  class="myedit">{{ old('content_en') }}</textarea>
                            @error('content_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for=""> {{ __('Content_ar') }}</label>
                            <textarea name="content_ar" id="content_ar" cols="10" rows="2"  class="myedit">{{ old('content_ar') }}</textarea>
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
                    <button class="btn btn-success pd-x-30 mg-r-5 mg-t-5">{{ __('Add') }}</button>
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-dark pd-x-30 mg-t-5">{{ __('Cancel') }}</a>
                </div>
               </form>
            </div>
        </div>
    </div>

@endsection

@section('script')



		<!--Internal Fileuploads js-->
		<script src="{{ asset('adminassets/plugins/fileuploads/js/fileupload.js') }}"></script>
        <script src="{{ asset('adminassets/plugins/fileuploads/js/file-upload.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" integrity="sha512-tofxIFo8lTkPN/ggZgV89daDZkgh1DunsMYBq41usfs3HbxMRVHWFAjSi/MXrT+Vw5XElng9vAfMmOWdLg0YbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
        tinymce.init({
            selector: '.myedit'
        })
        </script>
@endsection
