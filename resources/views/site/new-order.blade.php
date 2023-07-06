@extends('site.master')
@php
    $show_order = 'show_order_' . app()->currentLocale();
@endphp
@section('title', 'Order')

@section('content')
    <section class="login py-5 border-top-1 " style="direction: rtl;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-8 align-item-center register-bg border-ptofile">
                    <h5 class="new-profile">طلباتي</h5>
                    <input type="hidden" id="token_search" value="{{ csrf_token() }}">
                    <input type="hidden" id="ajax_search_url" value="{{ route('site.order.ajax_search') }}">
                </div>
                <div class="col-lg-8 col-md-8 align-item-center border-profile1">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="input-group mb-3 mt-3 direction-ltr">
                                <button class="input-group-text" id="basic-addon1"><img
                                        src="{{ asset('webassets/images/blog/search-normal.svg') }}"
                                        alt=""></button>
                                <input type="text" name="searchbyOrderNumber" id="searchbyOrderNumber"
                                    class="form-control" placeholder="بحث برقم الطلب" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-5 mt-3 text-right">
                            <select name="Order_typeSearch" id="Order_typeSearch" class="profile-select">
                                <option value="all">نوع الطلب</option>
                                <option value="1">منتج</option>
                                <option value="0">خدمة</option>

                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col cols-2 text-left all">الكل<span>({{ $all_orders_count }})</span></div>
                                <div class="col  cols-2">قيد التنفيد<span>({{ $waiting }})</span></div>
                                <div class="col cols-2">بانتظار الدفع<span>({{ $waiting_pay }})</span></div>
                                <div class="col cols-2">مكتمل<span>({{ $finish }})</span></div>
                            </div>
                        </div>

                        <div class="col-lg-12 " id="ajax_search_table">
                            <table class="table">
                                <tr class="table-header">
                                    <th>رقم الطلب</th>
                                    <th>رقم واتس البائع</th>
                                    <th>حالة الطلب</th>
                                    <th>تاريخ الطلب</th>
                                    <th>نوع الطلب</th>
                                    <th>تفاصيل الطلب</th>
                                </tr>
                                @foreach ($orders as $info)
                                    <tr class="table-body text-center">
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
                                        <td>
                                            @if ($info->order_status == 1)
                                                <button class="btn btn-finish">مكتمل </button>
                                            @elseif($info->order_status == 2)
                                                <button class="btn btn-payment">بإنتظار الدفع</button>
                                            @else
                                                <button class="btn btn-waiting">قيد التنفيد</button>
                                            @endif
                                        </td>
                                        <td>{{ $info->created_at->format('F d, Y,') }}</td>
                                        <td>
                                            @if ($info->order_type == 1)
                                                منتج
                                            @else
                                                خدمة
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('site.orderShow', $info->id) }}" class="show"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal{{ $info->id }}"
                                                data-bs-whatever="@mdo">مشاهدة التفاصيل</a>
                                                @if ($info->order_status != 1)
                                                    @if ($info->total || $info->url_pay || $info->invoice_id)
                                                    <a style="padding: 5px;" href="{{  $info->url_pay }}" target="_blank" class="btn btn-payment">دفع الأن</a>                                            </td>
                                                    @endif
                                                @endif

                                    </tr>
                                    <div class="modal fade" id="exampleModal{{ $info->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-header-edit1">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"><img
                                                            src="{{ asset('webassets/images/blog/close-circle.svg') }}"
                                                            alt=""></button>
                                                </div>
                                                <div class="modal-body modal-body-edit">
                                                    <h5>
                                                        {{ __('Show Order') }}
                                                        <span class="modal-span">
                                                            @if ($info->order_status == 1)
                                                                p
                                                            @elseif ($info->order_status == 2)
                                                                S
                                                            @else
                                                                S
                                                            @endif
                                                            {{ $info->number_orders }}
                                                        </span>
                                                    </h5>
                                                    <p>{{ $info->$show_order }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </table>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>




@endsection

@section('script')
    <script src="{{ asset('webassets/js/orderShow.js') }}"></script>
@endsection
