<?php

namespace App\Http\Requests\Gallery;

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
            'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
            'keywords' => 'required|string',
        ];
    }

    public function messages()
    {

        return [
                //
                'title.required' => 'The title is required',
                'description.required' => 'The description is required',
                'image.required' => 'The image is required',
                'keywords.required' => 'Keywords are required', 
            ];
    }
}
