<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSettingsRequest extends FormRequest
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
            'title_video_en' => 'required|max:255',
            'title_video_ar' => 'required|max:255',
            'content_video_en' => 'required|max:1000',
            'content_video_ar' => 'required|max:1000',
            'title_gallary_en' => 'required|max:255',
            'title_gallary_ar' => 'required|max:255',
            'content_gallary_en' => 'required|max:1000',
            'content_gallary_ar' => 'required|max:1000',
            'active' => 'required',
            'privacy_policy_en' => 'required|max:2000',
            'privacy_policy_ar' => 'required|max:2000',
            'Terms_and_Conditions_en' => 'required|max:2000',
            'Terms_and_Conditions_ar' => 'required|max:2000',
            'logo_header' => 'required|image|mimes:png,jpg,jpeg,svg,gif',
            'logo_footer' => 'required|image|mimes:png,jpg,jpeg,svg,gif',
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
            'privacy_policy_en.required' => 'يرجى كتابة سياسة الخصوصية',
            'privacy_policy_ar.required' => 'يرجى كتابة سياسة الخصوصية',
            'Terms_and_Conditions_en.required' => 'يرجى كتابة الاحكام والشروط',
            'Terms_and_Conditions_ar.required' => 'يرجى كتابة الاحكام والشروط',
            'logo_header.required' => 'يرجى اختيار صورة',
            'logo_footer.required' => ' يرجى اختيار صورة',
        ];
    }
}
