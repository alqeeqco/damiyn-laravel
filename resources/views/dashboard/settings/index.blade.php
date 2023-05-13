@extends('dashboard.include.master')
@php
    $title_video = 'title_video_'.app()->currentLocale();
    $content_video = 'content_video_'.app()->currentLocale();
    $title_gallary = 'title_gallary_'.app()->currentLocale();
    $content_gallary = 'content_gallary_'.app()->currentLocale();
    $privacy_policy = 'privacy_policy_'.app()->currentLocale();
    $Terms_and_Conditions = 'Terms_and_Conditions_'.app()->currentLocale();
@endphp
@section('title')
{{ __('Settings') }}
@endsection
@section('titlecontent')
{{ __('Dashboard') }}
@endsection
@section('titlelinkcontent')
<a href="{{ route('admin.settings.index') }}">{{ __('Settings') }}</a>
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
                <div class="card-header" style="text-align: end">
                    <button class="btn btn-info"><a  href=" {{ route('admin.settings.create') }}">{{ __('admin.add settings ') }} </a></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table border-top-0  table-bordered text-nowrap border-bottom" id="asasd"
                            id="responsive-datatable">

                            @if (@isset($data) && !@empty($data))
                            <tr>
                                <td class="width30">{{ __('ID') }}</td>
                                <td> {{ $data['id'] }}</td>
                            </tr>

                            <tr>
                                <td class="width30">{{ __('Logo Header') }}</td>
                                <td><img width="80" src="{{ asset('uploads/settings/'.$data['logo_header']) }}" alt=""></td>
                            </tr>


                            <tr>
                                <td class="width30"> {{ __('Logo footer') }}</td>
                                <td> <img width="80" src="{{ asset('uploads/settings/'.$data['logo_footer']) }}" alt=""></td>
                            </tr>

                            <tr>
                                <td class="width30">{{ __('Video') }}</td>
                                <td> {{ $data['video'] }}</td>
                            </tr>

                            <tr>
                                <td class="width30">{{ __('Video Title') }}</td>
                                <td> {{ $data[$title_video] }} </td>
                            </tr>
                            <tr>
                                <td class="width30"> {{ __('Video Content') }}</td>
                                <td> {{ $data[$content_video] }}</td>
                            </tr>


                            <tr>
                                <td class="width30">{{ __('Gallary Title') }}</td>
                                <td> {{ $data[$title_gallary] }}</td>
                            </tr>


                            <tr>
                                <td class="width30">{{ __('Gallary Content') }}</td>
                                <td>  {!! Str::words($data[$content_gallary], 15, '...') !!}</td>
                            </tr>

                            <tr>
                                <td class="width30"> {{ __('Privacy Policy') }}</td>
                                <td>  {!! Str::words($data[$privacy_policy], 15, '...') !!} </td>
                            </tr>

                            <tr>
                                <td class="width30"> {{ __('Terms and Conditions') }}</td>
                                <td> {!! Str::words($data[$Terms_and_Conditions], 15, '...') !!}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('Active') }}</td>
                                <td>

                                    @if($data['active'] == 1)
                                        <a href="{{ route('admin.settings.toggle_active',$data['id']) }}" class="btn text-white"
                                                style="font-size: 12px;background: #4FE39C"> <i class="fa fa-check"></i>
                                        </a>
                                    @elseif($data['active'] == 2)
                                        <a href="{{ route('admin.settings.toggle_active',$data['id']) }}" class="btn text-white"
                                           style="font-size: 12px;background: #DC4267"><i class="fas fa-times"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.settings.toggle_active',$data['id']) }}" class="btn text-white btn-warning"
                                                style="font-size: 12px"><i class="fas fa-times"></i>
                                        </a>
                                    @endif
                            </td>
                            </tr>

                            <tr>
                                <td class="width30"> تاريخ اخر تحديث</td>
                                <td>
                                    @if ($data['updated_by'] > 0 and $data['updated_by'] != null)
                                        @php
                                            $dt = new DateTime($data['updated_at']);
                                            $date = $dt->format('Y-m-d');
                                            $time = $dt->format('h:i');
                                            $newDateTime = date('A', strtotime($time));
                                            $newDateTimeType = $newDateTime == 'AM' ? 'صباحا ' : 'مساء';
                                        @endphp
                                        {{ $date }}
                                        {{ $time }}
                                        {{ $newDateTimeType }}
                                        بواسطة
                                        {{ $data['updated_by_admin'] }}
                                    @else
                                        {{ __('No Updated') }}
                                    @endif


                                </td>
                            </tr>

                            <tr>
                                <td class="width30"></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.settings.edit',$data['id']) }}"><span class="fe fe-edit"> </span></a>
                                    <form class="d-inline" action="{{ route('admin.settings.delete',$data['id']) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    <button class="btn  btn-sm btn-danger" onclick="return confirm('Are you sure')"><span class="fe fe-trash-2"> </span></button>
                                    </form>
                                </td>
                            </tr>
                            @else
                            <div class="alert alert-danger">
                                عفوا لاتوجد بيانات لعرضها !!
                            </div>
                        @endif
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
                $("# $data['id']}}").prop("checked", true);
                ids.push($data['id'])
            } else {
                $("# $data['id']").prop("checked", false);
                ids = [];
            }
        }else {
            if ($('#'+id).is(":checked")) {
                ids.push(id)
            }else {
                $("#0").prop("checked", false);
                ids.splice(ids.indexOf(id), 1)
            }
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
