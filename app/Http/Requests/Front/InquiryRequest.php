<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|max:100|email',
            'subject' => 'required|max:100',
            'message' => 'required|max:1000'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên của bạn',
            'email' => 'Email',
            'subject' => 'Tiêu đề',
            'message' => 'Nội dung'
        ];
    }

}
