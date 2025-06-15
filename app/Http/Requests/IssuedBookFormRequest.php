<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IssuedBookFormRequest extends FormRequest
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
    public function rules()
    {
        if(request()->isMethod('post')){

            return [
                //
                'issued_date' => 'required|string|max:100',
                'return_date' => 'required|string',
                'recommentation' => 'required|string',
                'serial_no' => 'required|string',
                
            ];
        } else {
            return [
                'issued_date' => 'required|string|max:100',
                'return_date' => 'required|string',
                'recommentation' => 'required|string',
                'serial_no' => 'required|string',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'issued_date.required' => 'The date is required',
                'return_date.required' => 'The date is required',
                'recommentation' => 'The condition of the book is required',
                'serial_no' => 'The serial number is required',
            ];
        } else {
            return [
                //
                'issued_date.required' => 'The date is required',
                'return_date.required' => 'The date is required',
                'recommentation' => 'The condition of the book is required',
                'serial_no' => 'The serial number is required',
            ];
        }
    }
}
