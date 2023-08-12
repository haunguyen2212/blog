<?php

namespace App\Http\Requests\Admin;

use App\Rules\Exist;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|max:100',
            'slug' => 'required|max:100',
            'category' => [
                'required',
                new Exist('categories.id')
            ]
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Tiêu đề',
            'slug' => 'Slug',
            'category' => 'Danh mục'
        ];
    }
}
