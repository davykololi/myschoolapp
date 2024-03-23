<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmFormRequest extends FormRequest
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
                'type' => 'required|string', 
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'type' => 'required|string',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the farm is required',
                'type.required' => 'The category the farm belongs to is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the farm is required',
                'type.required' => 'The category the farm belongs to is required',
            ];
        }
    }
}
