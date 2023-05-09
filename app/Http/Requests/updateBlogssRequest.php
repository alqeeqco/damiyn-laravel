<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateBlogssRequest extends FormRequest
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
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'active' => 'required',
            'image' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'title_en.required' => 'اسم العنوان كاملا مطلوب',
            'title_ar.required' => 'اسم العنوان كاملا مطلوب',
            'content_en.required' => 'يرجى تعبئة المحتوى',
            'content_ar.required' => 'يرجى تعبئة المحتوى',
            'active.required' => ' حالة التفعيل مطلوب',
        ];
    }
}
