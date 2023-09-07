<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingFormRequest extends FormRequest
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
                'agenda' => 'required|string|max:100',
                'date' => 'required|string',
                'venue' => 'required|string|max:100',
                'start_at' => 'required|string',
                'end_at' => 'required|string',
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'agenda' => 'required|string|max:100',
                'date' => 'required|string',
                'venue' => 'required|string|max:100',
                'start_at' => 'required|string',
                'end_at' => 'required|string',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the meeting is required',
                'agenda.required' => 'The agenda of the meeting is required',
                'date.required' => 'The date for the meeting is required',
                'venue.required' => 'The venue for the meeting is required',
                'start_at.required' => 'The time the meeting starts is required',
                'end_at.required' => 'The time the meeting ends is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the meeting is required',
                'agenda.required' => 'The agenda of the meeting is required',
                'date.required' => 'The date for the meeting is required',
                'venue.required' => 'The venue for the meeting is required',
                'start_at.required' => 'The time the meeting starts is required',
                'end_at.required' => 'The time the meeting ends is required', 
            ];
        }
    }
}
