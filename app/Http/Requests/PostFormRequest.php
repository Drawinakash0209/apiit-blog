<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Type\Integer;

class PostFormRequest extends FormRequest
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
            'category_id' => [
                'required',
                'integer'
            ],


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
                'nullable',
                'mimes:jpeg,jpg,png'

            ],

            'v_iframe' => [
                'nullable'
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
              

            ],
            'status' => [
                'nullable',
               

            ],

            'termsAndCond' => [
                'required',
            ],

            

        ];

        return $rules;
    }
    
}
