<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportOrders implements FromCollection , ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $orders = Order::select(
            'id',
            'number_orders',
            'user_id',
            'mobile_user',
            'order_status',
            'order_type',
            'added_by',
            'date',
            'active',
            'show_order_en',
            'show_order_ar',
            'created_at'
        )->orderBy('id', 'desc')->with('user')->get();

        $data = [];
        foreach ($orders as $key => $value) {
            if ($value->order_status == 1)
                $data[$key]['number_orders'] = 'p -' . $value->number_orders;
            else
                $data[$key]['number_orders'] = 'S -' . $value->number_orders;

            $data[$key]['mobile_vendor'] = $value->mobile_user;
            $data[$key]['mobile_user'] = $value->user->phone;

            if ($value->order_status == 1)
                $data[$key]['order_status'] = 'مكتمل';
            elseif ($value->order_status == 2)
                $data[$key]['order_status'] = 'بانتظار الدفع';
            else
                $data[$key]['order_status'] = 'قيد التنفيذ';

            if ($value->order_type == 1)
                $data[$key]['order_type'] = 'منتج';
            else
                $data[$key]['order_type'] = 'خدمة';

            $data[$key]['show_order_ar'] = $value->show_order_ar;
            $data[$key]['created_at'] = Carbon::parse($value->created_at)->format('Y/m/d H:i:s');
        }

        array_unshift($data, [
            'number_orders' => '#',
            'mobile_vendor' => 'رقم البائع',
            'mobile_user' => 'رقم الزبون',
            'order_status' => 'حالة',
            'order_type' => 'نوع',
            'show_order_ar' => 'تفاصيل',
            'created_at' => 'تاريخ الإنشاء',
        ]);
        $data = collect($data);
        return $data;
    }
}
