<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignFormRequest extends FormRequest
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
                'date_given' => 'required|date',
                'deadline' => 'required|date',
                'file' => 'required|mimes:pdf,xlx,csv|max:2048',
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'date_given' => 'required|date',
                'deadline' => 'required|date',
                'file' => 'required|mimes:pdf,xlx,csv|max:2048',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the assignment is required',
                'date_given.required' => 'The date of issuing assignment is required',
                'deadline.required' => 'The deadline for assignment submission is required',
                'file.required' => 'The file for the assignment is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the assignment is required',
                'date_given.required' => 'The date of issuing assignment is required',
                'deadline.required' => 'The deadline for assignment submission is required',
                'file.required' => 'The file for the assignment is required',
            ];
        }
    }
}
