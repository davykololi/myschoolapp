<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StdSubjectFormRequest extends FormRequest
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
                'teacher' => 'required|exists:teachers,id', 
                'stream' => 'required|exists:streams,id',
                'subject' => 'required|exists:subjects,id',
            ];
        } else {
            return [
                'desc' => 'required|string|max:100',
                'teacher' => 'required|exists:teachers,id', 
                'stream' => 'required|exists:streams,id',
                'subject' => 'required|exists:subjects,id',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'desc.required' => 'The name of the stream subject is required',
                'teacher.required' => 'The name of the teacher facilitating this stream subject is required',
                'stream.required' => 'The stream this subject belongs to is required',
                'subject.required' => 'The general subject this stream subject belongs to is required',
            ];
        } else {
            return [
                //
                'desc.required' => 'The name of the stream subject is required',
                'teacher.required' => 'The name of the teacher facilitating this stream subject is required',
                'stream.required' => 'The stream this subject belongs to is required',
                'subject.required' => 'The general subject this stream subject belongs to is required',
            ];
        }
    }
}
