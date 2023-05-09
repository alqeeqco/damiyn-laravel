<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateOrdersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'number_orders' => 'required',
            'mobile_user' => 'required',
            'Order_status' => 'required',
            'show_order_en' => 'nullable',
            'show_order_ar' => 'nullable',
            'Order_type' => 'required',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'number_orders.required' => 'اسم  كاملا مطلوب',
            'mobile_user.required' => 'اسم  كاملا مطلوب',
            'Order_status.required' => 'اسم  كاملا مطلوب',
            'show_order_en.required' => 'اسم  كاملا مطلوب',
            'show_order_ar.required' => 'اسم  كاملا مطلوب',
            'Order_type.required' => 'اسم  كاملا مطلوب',
            'active.required' => ' حالة التفعيل مطلوب',
        ];
    }
}
