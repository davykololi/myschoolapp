<?php

namespace App\Http\Requests\PaymentRecord;

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
            'amount_paid' => 'required|string',
            'payment_mode' => 'required|string',
            'payment_ref_code' => 'required|string',
            'payment_date' => 'required|string',
        ];
    }

    public function messages()
    {

        return [
                //
                'amount.required' => 'The amount paid is required',
                'payment_mode.required' => 'The mode of payment is required',
                'payment_ref_code.required' => 'The payment reference number is required',
                'payment_date.required' => 'The bank payment date is required',
            ];
    }
}
