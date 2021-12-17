<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YearFormRequest extends FormRequest
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
                'year' => 'required|string|max:100',
                'desc' => 'required|string|max:100'
            ];
        } else {
            return [
                'year' => 'required|string|max:100',
                'desc' => 'required|string|max:100'
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'year.required' => 'The year is required',
                'desc.required' => 'The description of the year is required',
            ];
        } else {
            return [
                //
                'year.required' => 'The year is required',
                'desc.required' => 'The description of the year is required',  
            ];
        }
    }
}
