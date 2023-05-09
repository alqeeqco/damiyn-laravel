<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name_en' => 'required',
            'name_ar' => 'required',
            'message_en' => 'required',
            'message_ar' => 'required',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'اسم  كاملا مطلوب',
            'name_ar.required' => 'اسم  كاملا مطلوب',
            'active.required' => ' حالة التفعيل مطلوب',
            'message_en.required' => 'يرجى كتابة الرسالة',
            'message_ar.required' => 'يرجى كتابة الرسالة',
        ];
    }
}
