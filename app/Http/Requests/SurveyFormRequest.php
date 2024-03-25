<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Type\Integer;

class SurveyFormRequest extends FormRequest
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
        
        $rules = [
            'name' => [
                'required',
                'string',
                'max:200'
            ],
            // 'slug' => [
            //     'required',
            //     'string',
            //     'max:200'
            // ],
            'description' => [
                'required'
            ],
            'form_link' => [
                'required',
                'url'
            ],
            // 'meta_title' => [
            //     'required',
            //     'string',
            //     'max:200'
            // ],
            // 'meta_description' => [
            //     'required',
            //     'string',
            //     'max:200'
            // ],
            // 'meta_keywords' => [
            //     'required',
            //     'string',
            //     'max:200'
            // ],
          
            'cb_number' => [
                'required',
                'string'
            ]
        ];
    
        return $rules;

    }
}
