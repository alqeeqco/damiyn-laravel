<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentUrlRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "id" => "required|exists:orders,id",
            "total" => "required|numeric",
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'حدث خطأ ما',
            'id.exists' => 'حدث خطأ ما',
            'total.required' => 'يرجى أرسال مجموع الطلب',
            'total.numeric' => 'يرجى أرسال رقم',
        ];
    }
}
