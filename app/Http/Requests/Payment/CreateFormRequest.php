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
            'year_id'   => 'required|exists:years,id',
        ];
    }

    public function messages()
    {

        return [
                //
                'year_id.required' => 'The year is required',
            ];
    }
}
