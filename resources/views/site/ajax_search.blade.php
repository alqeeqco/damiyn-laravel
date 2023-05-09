
@php
$show_order= 'show_order_'.app()->currentLocale();
@endphp
@if (@isset($orders) && !@empty($orders) && count($orders) > 0)
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
       @foreach ($orders as $info )
       <tr class="table-body text-center">
        <td>{{ $info->number_orders }}</td>
        <td>{{ $info->mobile_user }}</td>
        <td>
            @if ($info->Order_status == 1)
            <button class="btn btn-finish">مكتمل </button>
            @elseif($info->Order_status == 2)
            <button class="btn btn-payment">بإنتظار الدفع</button>

            @else
            <button class="btn btn-waiting">قيد التنفيد</button>

            @endif
        </td>
        <td>{{ $info->created_at->format('F d, Y,')}}</td>
        <td>
            @if ($info->Order_type == 1)
            منتج
            @else
            خدمة
            @endif
        </td>
        <td><a href="{{ route('site.orderShow',$info->id) }}" class="show" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $info->id }}" data-bs-whatever="@mdo">مشاهدة التفاصيل</a></td>
    </tr>
    <div class="modal fade" id="exampleModal{{ $info->id }}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-edit1">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                            src="{{ asset('webassets/images/blog/close-circle.svg') }}" alt=""></button>
                </div>
                <div class="modal-body modal-body-edit">
                    <h5> <span class="modal-span">{{ $info->number_orders }}</span>{{ __("Show Order") }}</h5>
                    <p>{{ $info->$show_order }}</p>
                </div>
            </div>
        </div>
    </div>
       @endforeach

    </table>
</div>
@else
    <div class="clearfix"></div>
    <div class="alert alert-danger">
        عفوا لاتوجد بيانات لعرضها !!
    </div>
@endif
