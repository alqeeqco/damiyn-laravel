@extends('dashboard.include.master')
@php
    $title = 'title_'.app()->currentLocale();
    $content = 'content_'.app()->currentLocale();
@endphp
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
{{ __('Show') }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('adminassets/scss/plugins/_dataTables.bootstrap5.scss') }}">
    <link rel="stylesheet" href="{{ asset('adminassets/scss/plugins/_buttons.bootstrap5.scss') }}">
    <link rel="stylesheet" href="{{ asset('adminassets/scss/plugins/_responsive.bootstrap5.scss') }}">
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table border-top-0  table-bordered text-nowrap border-bottom" id="asasd"
                            id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{ __('ID') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Title') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Image') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Content') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Updated at') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Active') }}</th>
                                    <th class="wd-15p border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $info )
                                <tr>
                                    <th scope="row">{{ $info->id }}</th>
                                    <td>{{ $info->$title }}</td>
                                    <td><img width="80" src="{{ asset('uploads/Blog/'.$info->image ) }}" alt=""></td>
                                    <td>{!! Str::words($info->$content, 15, '...') !!}</td>
                                    <td>
                                        @if ($info->updated_by > 0 and $info->updated_by != null)
                                            @php
                                                $dt = new DateTime($info->updated_at);
                                                $date = $dt->format('Y-m-d');
                                                $time = $dt->format('h:i');
                                                $newDateTime = date('A', strtotime($time));
                                                $newDateTimeType = $newDateTime == 'AM' ? 'صباحا ' : 'مساء';
                                            @endphp
                                            {{ $date }} <br>
                                            {{ $time }}
                                            {{ $newDateTimeType }} <br>
                                            بواسطة
                                            {{ $data['updated_by_admin'] }}
                                        @else
                                            {{ __('No Updated') }}
                                        @endif

                                    </td>
                                    <td>
                                        @if ($info->active == 1)
                                        {{ __('Enabled') }}
                                        @else
                                        {{ __('Disabled') }}
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.blogs.edit',$info->id) }}"><span class="fe fe-edit"> </span></a>
                                        <form class="d-inline" action="{{ route('admin.blogs.delete',$info->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <button class="btn  btn-sm btn-danger" onclick="return confirm('Are you sure')"><span class="fe fe-trash-2"> </span></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Internal Select2.min js -->
    {{-- <script src="{{ asset('adminassets/plugins/select2/js/select2.min.js') }}"></script> --}}

    <!-- DATA TABLE JS -->
    <script src="{{ asset('adminassets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('adminassets/js/table-data.js') }}"></script>
    <script>
        $('#asasd').DataTable();
    </script>
@endsection
