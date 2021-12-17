<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name' => 'required|string|max:100',
                'phone_no' => 'required|string|max:500',
                'lib_head' => 'required|string|max:100',
                'lib_asshead' => 'required|string|max:500'
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'phone_no' => 'required|string|max:500',
                'lib_head' => 'required|string|max:100',
                'lib_asshead' => 'required|string|max:500'
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the library is required',
                'phone_no.required' => 'The library phone number is required',
                'lib_head.required' => 'The name of the senior librarian is required',
                'lib_asshead.required' => 'The name of the assistant librarian is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the library is required',
                'phone_no.required' => 'The library phone number is required',
                'lib_head.required' => 'The name of the senior librarian is required',
                'lib_asshead.required' => 'The name of the assistant librarian is required',
            ];
        }
    }
}
