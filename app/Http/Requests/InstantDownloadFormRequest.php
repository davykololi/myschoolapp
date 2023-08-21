<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstantDownloadFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required|min:5|max:6',
        ];
    }

    public function messages()
    {

        return [
                //
                'code.required' => 'The code is required', 
            ];
    }
}
