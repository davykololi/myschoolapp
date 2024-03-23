<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'year' => 'required',
        ];
    }

    public function messages()
    {

        return [
                //
                'year.required' => 'The year is required',   
            ];
    }
}
