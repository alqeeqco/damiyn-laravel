<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateSettingsRequest extends FormRequest
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
            'video' => 'required',
            'title_video_en' => 'required',
            'title_video_ar' => 'required',
            'content_video_en' => 'required',
            'content_video_ar' => 'required',
            'title_gallary_en' => 'required',
            'title_gallary_ar' => 'required',
            'content_gallary_en' => 'required',
            'content_gallary_ar' => 'required',
            'active' => 'required',
            'privacy_policy_en' => 'required',
            'privacy_policy_ar' => 'required',
            'Terms_and_Conditions_en' => 'required',
            'Terms_and_Conditions_ar' => 'required',
            'logo_header' => 'nullable',
            'logo_footer' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'video.required' => 'يرحى وضع رابط الفيديو',
            'title_video_en.required' => ' يرجى كتابة العنوان الذي بجانب الفيديو',
            'title_video_ar.required' => ' يرجى كتابة العنوان الذي بجانب الفيديو',
            'content_video_en.required' => ' يرجى كتابة المحتوى الذي بجانب الفيديو',
            'content_video_ar.required' => ' يرجى كتابة المحتوى الذي بجانب الفيديو',
            'title_gallary_en.required' =>  ' يرجى كتابة العنوان الذي بجانب الصور',
            'title_gallary_ar.required' =>  ' يرجى كتابة العنوان الذي بجانب الصور',
            'content_gallary_en.required' =>' يرجى كتابة المحتوى الذي بجانب الصور',
            'content_gallary_ar.required' =>' يرجى كتابة المحتوى الذي بجانب الصور',
            'active.required' => ' حالة التفعيل مطلوب',
            'privacy_policy.required' => 'يرجى كتابة سياسة الخصوصية',
            'Terms_and_Conditions.required' => 'يرجى كتابة الاحكام والشروط',
        ];
    }
}
