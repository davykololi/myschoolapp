<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required',
            'ref_no' => 'required|string',
        ];
    }

    public function messages()
    {

        return [
                //
                'title.required' => 'The payment title is required',
                'description.required' => 'The payment description is required',
                'amount.required' => 'The payment amount is required',
                'ref_no.required' => 'The payment reference number is required',   
            ];
    }
}
