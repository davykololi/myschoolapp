<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCategoryFormRequest extends FormRequest
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
                'name' => 'required|string|max:100',
                'desc' => 'required|string|max:100'
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'desc' => 'required|string|max:100'
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The category name is required',
                'desc.required' => 'The description of the category is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The category name is required',
                'desc.required' => 'The description of the category is required',
            ];
        }
    }
}
