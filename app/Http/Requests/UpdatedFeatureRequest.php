<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatedFeatureRequest extends FormRequest
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
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'content_en' => 'required|max:2000',
            'content_ar' => 'required|max:2000',
            'active' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif',
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
