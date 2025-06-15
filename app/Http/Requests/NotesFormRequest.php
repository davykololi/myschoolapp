<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotesFormRequest extends FormRequest
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
                'file' => 'required|mimes:pdf,xlx,csv|max:2048',
                'desc' => 'required|string|max:500',
            ];
        } else {
            return [
                'file' => 'required|mimes:pdf,xlx,csv|max:2048',
                'desc' => 'required|string|max:500',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'file.required' => 'The notes file is required',
                'desc.required' => 'The description of the notes is required',
            ];
        } else {
            return [
                //
                'file.required' => 'The notes file is required',
                'desc.required' => 'The description of the notes is required', 
            ];
        }
    }
}
