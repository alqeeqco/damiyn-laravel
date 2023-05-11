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
                    <button class="btn btn-success"><a  href=" {{ route('admin.settings.create') }}">{{ __('admin.add settings ') }} </a></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table border-top-0  table-bordered text-nowrap border-bottom" id="asasd"
                            id="responsive-datatable">
                            {{-- <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{ __('ID') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Logo Header') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Logo footer') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Video') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Video Title') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Video Content') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Gallary Title') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Gallary Content') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Privacy Policy') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Terms and Conditions') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Updated at') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Active') }}</th>
                                    <th class="wd-15p border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $info)
                                <tr>
                                    <th scope="row">{{ $info->id }}</th>
                                    <th scope="row"><img width="80" src="{{ asset('uploads/settings/'.$info->logo_header) }}" alt=""></th>
                                    <th scope="row"><img width="80" src="{{ asset('uploads/settings/'.$info->logo_footer) }}" alt=""></th>
                                    <td>{{ $info->video }}</td>
                                    <td>{{ $info->$title_video }}</td>
                                    <td>{{ $info->$content_video }}</td>
                                    <td>{{ $info->$title_gallary }}</td>
                                    <td>{{ $info->$content_gallary }}</td>
                                    <td>{{ $info->$privacy_policy }}</td>
                                    <td>{{ $info->$Terms_and_Conditions }}</td>
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
                                         No Updated
                                    @endif

                                    </td>
                                    <td>
                                        @if ($info->active == 1)
                                        Enabled
                                        @else
                                        Disabled
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.settings.edit',$info->id) }}"><span class="fe fe-edit"> </span></a>
                                        <form class="d-inline" action="{{ route('admin.settings.delete',$info->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <button class="btn  btn-sm btn-danger" onclick="return confirm('Are you sure')"><span class="fe fe-trash-2"> </span></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody> --}}
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
                                    @if ($data['active'] == 1)
                                    {{ __('Enabled') }}
                                    @else
                                    {{ __('Disabled') }}
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
@endsection
