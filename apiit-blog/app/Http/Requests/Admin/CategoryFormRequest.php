<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules =  [
            'name' => [
                'required',
                'string',
                'max:200'

            ],

            'slug' => [
                'required',
                'string',
                'max:200'

            ],

            'description' => [
                'required',

            ],
            'image' => [
                'required',
                'mimes:jpeg,jpg,png'

            ],
            'meta_title' => [
                'required',
                'string',
                'max:200'

            ],
            'meta_description' => [
                'required',
                'string',

            ],

            'meta_keywords' => [
                'required',
                'string',

            ],
            'meta_status' => [
                'nullable',
                'boolean'

            ],
            'status' => [
                'nullable',
                'boolean'

            ],

            

        ];

        return $rules;
    }
}
