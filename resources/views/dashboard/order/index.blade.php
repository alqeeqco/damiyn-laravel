@extends('dashboard.include.master')
@php
    $show_order = 'show_order_'.app()->currentLocale();
@endphp
@section('title')
    {{ __('Order') }}
@endsection
@section('titlecontent')
    {{ __('Dashboard') }}
@endsection
@section('titlelinkcontent')
    <a href="{{ route('admin.order.index') }}">{{ __('Order') }}</a>
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
                                    <th class="wd-15p border-bottom-0">{{ __('Number Orders') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Mobile User') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Order status') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Order Type') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Show Order') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Updated at') }}</th>
                                    <th class="wd-15p border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $info)
                                    <tr>
                                        <th scope="row">{{ $info->id }}</th>
                                        <td>
                                            @if ($info->order_status == 1)
                                            p -
                                            @elseif ($info->order_status == 2)
                                            S -
                                            @else
                                            S -
                                            @endif
                                            {{ $info->number_orders }}
                                        </td>

                                        <td>{{ $info->mobile_user }}</td>
                                        {{-- <td>
                                            @if ($info->order_status == 1)
                                                <button class="btn btn-success btn-sm">مكتمل</button>
                                            @elseif($info->order_status == 2)
                                                <button class="btn btn-warning btn-sm">بانتظار الدفع</button>
                                            @else
                                                <button class="btn btn-primary btn-sm">قيد التنفيذ</button>
                                            @endif
                                        </td> --}}
                                        <th>
                                            @if($info->order_status == 1)
                                                <a href="{{ route('admin.order.order_status',$info->id) }}" class="btn btn-success btn-sm">مكتمل
                                                </a>
                                            @elseif($info->order_status == 2)
                                                <a href="{{ route('admin.order.order_status',$info->id) }}" class="btn btn-warning btn-sm">بانتظار الدفع
                                                </a>
                                            @else
                                                <a href="{{ route('admin.order.order_status',$info->id) }}" class="btn btn-primary btn-sm"> قيد التنفيذ
                                                </a>
                                            @endif
                                        </th>
                                        <td>
                                            @if ($info->order_type == 1)
                                                منتج
                                            @else
                                                خدمة
                                            @endif
                                        </td>
                                        <td> {!! Str::words($info->$show_order , 10, '...') !!}</td>

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
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.order.edit', $info->id) }}"><span class="fe fe-edit">
                                                </span></a>
                                            <form class="d-inline" action="{{ route('admin.order.destroy', $info->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn  btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure')"><span class="fe fe-trash-2">
                                                    </span></button>
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
    <script src="{{ asset('adminassets/js/buttons.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let ids = [];

        function checkbox(id) {
            if (id === 0) {
                if ($('#' + id).is(":checked")) {
                    @foreach ($data as $info)
                        $("#{{ $info->id }}").prop("checked", true);
                        ids.push({{ $info->id }})
                    @endforeach
                } else {
                    @foreach ($data as $info)
                        $("#{{ $info->id }}").prop("checked", false);
                        ids = [];
                    @endforeach
                }
            } else {
                if ($('#' + id).is(":checked")) {
                    ids.push(id)
                } else {
                    $("#0").prop("checked", false);
                    ids.splice(ids.indexOf(id), 1)
                }
            }
        }

        function groupDelete() {
            if (ids.length > 0) {
                $.post("/leaders/groupDelete", {
                    ids: ids
                }).done(function() {
                    ids.forEach(item => {
                        $("#row-" + item).remove()
                    })
                    $("#0").prop("checked", false)
                }).fail(function() {

                });
            }
        }
    </script>
@endsection
