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
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'message_en' => 'required|max:1000',
            'message_ar' => 'required|max:1000',
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
