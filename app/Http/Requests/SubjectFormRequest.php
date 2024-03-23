<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectFormRequest extends FormRequest
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
                'name' => 'required|string|max:100|unique:subjects',
                'department' => 'required|exists:departments,id',
                'type' => 'required|exists:category_subjects,id',
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'department' => 'required|exists:departments,id',
                'type' => 'required',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the subject is required',
                'department.required' => 'The department the subject belogs to is required',
                'type.required' => 'The category this subject belongs to is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the subject is required',
                'department.required' => 'The department the subject belogs to is required',
                'type.required' => 'The category this subject belongs to is required', 
            ];
        }
    }
}
