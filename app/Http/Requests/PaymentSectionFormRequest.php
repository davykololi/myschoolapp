<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentSectionFormRequest extends FormRequest
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
        if(request()->isMethod('post')){

            return [
                //
                'name' => 'required|string|max:100',
                'description' => 'required|string|max:100',
                'payment_amount' => 'required',
                'ref_no' => 'required|string',
                'reciept_footer_info' => 'required|string',
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'description' => 'required|string|max:100',
                'payment_amount' => 'required',
                'ref_no' => 'required|string',
                'reciept_footer_info' => 'required|string',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The payment section name is required',
                'description.required' => 'The payment section description is required',
                'payment_amount.required' => 'The payment amount is required',
                'ref_no.required' => 'The payment reference number is required',
                'reciept_footer_info.required' => 'The reciept footer information is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The payment section name is required',
                'description.required' => 'The payment section description is required',
                'payment_amount.required' => 'The payment amount is required',
                'ref_no.required' => 'The payment reference number is required',
                'reciept_footer_info.required' => 'The reciept footer information is required',
            ];
        }
    }
}
