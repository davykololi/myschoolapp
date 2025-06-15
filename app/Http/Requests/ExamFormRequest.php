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
                'initials' => 'required|string|max:100',
                'start_date' => 'required|string',
                'end_date' => 'required|string',
                'year_id'   => 'required|exists:years,id',
                'term_id'   => 'required|exists:terms,id',
                'status' => 'required|integer|max:3',

            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'initials' => 'required|string|max:100',
                'start_date' => 'required|string',
                'end_date' => 'required|string',
                'year_id'   => 'required|exists:years,id',
                'term_id'   => 'required|exists:terms,id',
                'status' => 'required|integer|max:3',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the exam is required',
                'initials.required' => 'The exam initials are required',
                'start_date.required' => 'The date of starting exam is required',
                'end_date.required' => 'The date of ending exam is required',
                'year_id.required' => 'The year for the exam is required',
                'term_id.required' => 'The term for the exam is required',
                'status.required' => 'The exam status is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the exam is required',
                'initials.required' => 'The exam initials are required',
                'start_date.required' => 'The date of starting exam is required',
                'end_date.required' => 'The date of ending exam is required',
                'year.required' => 'The year for the exam is required',
                'term_id.required' => 'The term for the exam is required',
                'status.required' => 'The exam status is required',
            ];
        }
    }
}
