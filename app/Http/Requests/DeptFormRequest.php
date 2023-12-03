<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeptFormRequest extends FormRequest
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
                'phone_no' => 'required|string|max:100',
                'head_name' => 'required|string|max:100',
                'asshead_name' => 'required|string|max:100',
                'motto' => 'required|string|max:500',
                'vision' => 'required|string|max:500',
                'mission' => 'required|string|max:500',
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'phone_no' => 'required|string|max:100',
                'head_name' => 'required|string|max:100',
                'asshead_name' => 'required|string|max:100',
                'motto' => 'required|string|max:500',
                'vision' => 'required|string|max:500',
                'mission' => 'required|string|max:500',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the department is required',
                'phone_no.required' => 'The department phone number is required',
                'head_name.required' => 'The name of teacher heading the department is required',
                'asshead_name.required' => 'The name of teacher deputizing the department head is required',
                'motto.required' => 'The department motto is required',
                'vision.required' => 'The department vision is required',
                'mission.required' => 'The department mission is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the department is required',
                'phone_no.required' => 'The department phone number is required',
                'head_name.required' => 'The name of teacher heading the department is required',
                'asshead_name.required' => 'The name of teacher deputizing the department head is required',
                'motto.required' => 'The department motto is required',
                'vision.required' => 'The department vision is required',
                'mission.required' => 'The department mission is required',  
            ];
        }
    }
}
