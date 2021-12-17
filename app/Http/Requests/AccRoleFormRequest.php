<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccRoleFormRequest extends FormRequest
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
                'desc' => 'required|string|max:500'
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'desc' => 'required|string|max:500'
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => "The accountant role is required",
                'desc.required' => 'The description of the accountant role is required',
            ];
        } else {
            return [
                //
                'name.required' => "The accountant role is required",
                'desc.required' => 'The description of the accountant role is required',  
            ];
        }
    }
}
