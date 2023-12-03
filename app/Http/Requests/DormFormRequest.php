<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DormFormRequest extends FormRequest
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
                'bed_no' => 'required|integer',
                'dom_head' => 'required|string|max:100',
                'ass_head' => 'required|string|max:100',
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'bed_no' => 'required|integer',
                'dom_head' => 'required|string|max:100',
                'ass_head' => 'required|string|max:100',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the dormitory is required',
                'bed_no.required' => 'The number of beds in the dormitory is required',
                'dom_head.required' => 'The name of the student heading the dormitory is required',
                'ass_head.required' => 'The name of the assistant dormitory head is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the dormitory is required',
                'bed_no.required' => 'The number of beds in the dormitory is required',
                'dom_head.required' => 'The name of the student heading the dormitory is required', 
                'ass_head.required' => 'The name of the assistant dormitory head is required',
            ];
        }
    }
}
