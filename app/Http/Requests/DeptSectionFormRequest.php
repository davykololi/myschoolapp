<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeptSectionFormRequest extends FormRequest
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
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'description' => 'required|string|max:100',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The department section name is required',
                'description.required' => 'The department section description is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the club is required',
                'description.required' => 'The department section description is required',
            ];
        }
    }
}
