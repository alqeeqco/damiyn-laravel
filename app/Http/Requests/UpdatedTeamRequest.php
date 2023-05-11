<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatedTeamRequest extends FormRequest
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
            'name' => 'required|max:255',
            'active' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم  كاملا مطلوب',
            'active.required' => ' حالة التفعيل مطلوب',
        ];
    }
}
