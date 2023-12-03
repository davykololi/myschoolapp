<?php

namespace App\Http\Requests\PaymentRecord;

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
            'amount_paid' => 'required|string',
            'bank_name' => 'required|string',
            'file' => 'required',
            'payment_receipt_ref' => 'required|string',
            'payment_date' => 'required|string',
        ];
    }

    public function messages()
    {

        return [
                //
                'amount.required' => 'The amount paid is required',
                'bank_name.required' => 'The name of the bank the payment was made is requires',
                'file.required' => 'The receipt copy is required',
                'payment_receipt_ref.required' => 'The bank receipt reference number is required',
                'payment_date.required' => 'The bank payment date is required',
            ];
    }
}
