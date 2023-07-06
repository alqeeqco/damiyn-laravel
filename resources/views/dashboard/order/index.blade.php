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
<div id="error_message"></div>
<div class="modal" id="wasAgreed">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('It was agreed') }}</h6>
                <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <ul id="list_error_message"></ul>
                <form id="formWasAgreed" enctype="multipart/form-data">
                    <div class="row">

                        <input type="hidden" class="form-control" name="id" id="id">

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">{{ __('Total') }} :</label>
                            <input type="number" class="form-control" name="total" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="addWasAgreed">{{ __('Save') }}</button>
                        <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button"
                            id="close">{{ __('Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('order.export') }}" method="get">
                        @csrf
                    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                    <button type="submit" class="btn btn-success float-right">Excel</button>
                    @else
                        <button type="submit" class="btn btn-success float-left">Excel</button>
                    @endif
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table border-top-0  table-bordered text-nowrap border-bottom" id="asasd"
                            id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{ __('ID') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Number Orders') }}</th>
                                    <th class="wd-15p border-bottom-0">اسم المستخدم</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Mobile User') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Order status') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Order Type') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Total') }}</th>
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

                                        <td>{{ $info->user_id_name }}</td>
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
                                        <td>{{ $info->total ?? "لم يتم وضع مجموع" }}</td>
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
                                            @if ($info->order_status != 1)
                                            <button class="btn btn-sm btn-success" id="agreed" data-id="{{$info->id}}"><i class="far fa-handshake"></i></button>
                                            <a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.order.edit', $info->id) }}"><span class="fe fe-edit">
                                                </span></a>
                                            @endif
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
    <script>
        $(document).on('click', '#agreed', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#id').val(id);
            $('#wasAgreed').modal('show');
        });

    $(document).on('click', '#addWasAgreed', function (e) {
        e.preventDefault();
        let formdata = new FormData($('#formWasAgreed')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.order.createPaymentUrl') }}",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status == false) {
                    // errors
                    $('#list_error_message').html("");
                    $('#list_error_message').addClass("alert alert-danger");
                    $('#list_error_message').text(response.massage);
                } else {
                    console.log(response);
                    $('#error_message').html("");
                    $('#error_message').addClass("alert alert-success");
                    $('#error_message').text(response.massage);
                    $('#wasAgreed').modal('hide');
                    $('#formWasAgreed')[0].reset();
                    table.ajax.reload(null, false);
                }
            },
            error: function (response) {
                console.log(response);
                $('#list_error_message').html("");
                $('#list_error_message').addClass("alert alert-danger");
                $('#list_error_message').text(response.responseJSON.message);
            }
        });
});
    </script>

@endsection
