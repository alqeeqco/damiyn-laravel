@extends('dashboard.include.master')
@php
    $title = 'title_'.app()->currentLocale();

@endphp
@section('title')
{{ __('Slider') }}
@endsection
@section('titlecontent')
{{ __('Dashboard') }}
@endsection
@section('titlelinkcontent')
<a href="{{ route('admin.slider.index') }}"> {{ __('Slider') }}</a>
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
                    <button class="btn btn-info"><a  href="{{ route('admin.slider.create') }}">{{ __('admin.add slider') }}</a></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table border-top-0  table-bordered text-nowrap border-bottom" id="asasd"
                            id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{ __('ID') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Title') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Slider') }}</th>
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
                                    <td><img width="80" src="{{ asset('uploads/sliders/'.$info->slider) }}" alt=""></td>
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
                                        @if($info->active == 1)
                                                <a href="{{ route('admin.slider.toggle_active',$info->id) }}" class="btn text-white"
                                                        style="font-size: 12px;background: #4FE39C"> <i class="fa fa-check"></i>
                                                </a>
                                            @elseif($info->active == 2)
                                                <a href="{{ route('admin.slider.toggle_active',$info->id) }}" class="btn text-white"
                                                   style="font-size: 12px;background: #DC4267"><i class="fas fa-times"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.slider.toggle_active',$info->id) }}" class="btn text-white btn-warning"
                                                        style="font-size: 12px"><i class="fas fa-times"></i>
                                                </a>
                                            @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.slider.edit',$info->id) }}"><span class="fe fe-edit"> </span></a>
                                        <form class="d-inline" action="{{ route('admin.slider.destroy',$info->id) }}" method="POST">
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

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let ids = [];
    function checkbox(id) {
        if (id === 0) {
            if ($('#'+id).is(":checked")) {
                @foreach($data as $info)
                $("#{{$info->id}}").prop("checked", true);
                ids.push({{$info->id}})
                @endforeach
            } else {
                @foreach($data as $info)
                $("#{{$info->id}}").prop("checked", false);
                ids = [];
                @endforeach
            }
        } else {
            if ($('#'+id).is(":checked")) {
                ids.push(id)
            } else {
                $("#0").prop("checked", false);
                ids.splice(ids.indexOf(id), 1)
            }
        }
    }

    function groupDelete() {
        if (ids.length > 0) {
            $.post( "/leaders/groupDelete", {ids: ids}).done(function() {
                ids.forEach(item => {
                    $("#row-"+item).remove()
                })
                $("#0").prop("checked", false)
            }).fail(function() {

            });
        }
    }
</script>
@endsection
