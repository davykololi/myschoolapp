<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StreamSubjectFormRequest extends FormRequest
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
                'desc' => 'required|string|max:100',
                'teacher_id' => 'required|exists:teachers,id', 
                'stream_id' => 'required|exists:streams,id',
                'subject_id' => 'required|exists:subjects,id',
            ];
        } else {
            return [
                'desc' => 'required|string|max:100',
                'teacher_id' => 'required', 
                'stream_id' => 'required',
                'subject_id' => 'required',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'desc.required' => 'The name of the stream subject is required',
                'teacher_id.required' => 'The name of the teacher facilitating this stream subject is required',
                'stream_id.required' => 'The stream this subject belongs to is required',
                'subject_id.required' => 'The general subject this stream subject belongs to is required',
            ];
        } else {
            return [
                //
                'desc.required' => 'The name of the stream subject is required',
                'teacher_id.required' => 'The name of the teacher facilitating this stream subject is required',
                'stream_id.required' => 'The stream this subject belongs to is required',
                'subject_id.required' => 'The general subject this stream subject belongs to is required',
            ];
        }
    }
}
