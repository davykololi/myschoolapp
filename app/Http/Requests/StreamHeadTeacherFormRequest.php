<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StreamHeadTeacherFormRequest extends FormRequest
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
                'name_initials' => 'required|string|max:100',
                'description' => 'required|string|max:100',
                'stream_id' => 'required|exists:streams,id',
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'name_initials' => 'required|string|max:100',
                'description' => 'required|string|max:100',
                'stream_id' => 'required|exists:streams,id',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the teacher is required',
                'name_initials.required' => "The initials for the teacher's name are required",
                'description.required' => "The description of the teacher's role is required",
                'stream_id.required' => 'The stream that the teacher heads is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the teacher is required',
                'name_initials.required' => "The initials for the teacher's name are required",
                'description.required' => "The description of the teacher's role is required",
                'stream_id.required' => 'The stream that the teacher heads is required',
            ];
        }
    }
}
