<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventFormRequest extends FormRequest
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
                'required'
            ],

            'description' => [
                'required'
            ],

            'image' => [
                'nullable', 
                'mimes:jpeg,jpg,png'
            ],

            'start_date' => [
                'required'
            ],


            'location' => [
                'required'
            ],

            'end_date' => [
                'nullable'
            ],

            'type_of_event' => [
                'required'
            ],

            'start_time' => [
                'required'
            ],

           

            'terms'=> [
                'required',
            ]


        ];

        return $rules;
    }
}
