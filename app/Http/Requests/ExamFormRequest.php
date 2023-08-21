<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamFormRequest extends FormRequest
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
                'start_date' => 'required|string',
                'end_date' => 'required|string',
                'year' => 'required|integer|max:'.(date('Y')+1),
                'term' => 'required|string|max:100',

            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'start_date' => 'required|string',
                'end_date' => 'required|string',
                'year' => 'required|integer|max:'.(date('Y')+1),
                'term' => 'required|string|max:100',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the exam is required',
                'start_date.required' => 'The date of starting exam is required',
                'end_date.required' => 'The date of ending exam is required',
                'year.required' => 'The year the exam is done is required',
                'term.required' => 'The term the exam is done is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the exam is required',
                'start_date.required' => 'The date of starting exam is required',
                'end_date.required' => 'The date of ending exam is required',
                'year.required' => 'The year the exam is done is required',
                'term.required' => 'The term the exam is done is required',
            ];
        }
    }
}
