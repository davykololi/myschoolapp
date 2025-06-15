<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StreamFormRequest extends FormRequest
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
                'class_id' => 'required|exists:classes,id',
                'stream_section' => 'required|exists:stream_sections,id', 
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'class_id' => 'required|exists:classes,id',
                'stream_section' => 'required|exists:stream_sections,id',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the stream is required',
                'class_id.required' => 'The class this stream belongs to is required',
                'stream_section.required' => 'The stream section this stream belongs to is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The class stream is required',
                'class_id.required' => 'The class this stream belongs to is required',
                'stream_section.required' => 'The stream section this stream belongs to is required',
                
            ];
        }
    }
}
