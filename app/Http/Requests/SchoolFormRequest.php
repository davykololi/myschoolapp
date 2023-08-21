<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolFormRequest extends FormRequest
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
                'head' => 'required|string|max:100',
                'ass_head' => 'required|string|max:100',
                'motto' => 'required|string|max:100',
                'vision' => 'required|string|max:100',
                'mission' => 'required|string|max:100',
                'email' => 'required|email',
                'postal_address' => 'required|string|max:100',
                'core_values' => 'required|string|max:500',
                'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'initials' => 'required|string|max:100',
                'head' => 'required|string|max:100',
                'ass_head' => 'required|string|max:100',
                'motto' => 'required|string|max:100',
                'vision' => 'required|string|max:100',
                'mission' => 'required|string|max:100',
                'email' => 'required|email',
                'postal_address' => 'required|string|max:100',
                'core_values' => 'required|string|max:500',
                'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the school is required',
                'initials.required' => 'The school intials is required',
                'phone_no.required' => 'The contact phone number for the school is required',
                'head.required' => 'The name of teacher heading the school is required',
                'ass_head.required' => 'The name of teacher deputizing the school head is required',
                'motto.required' => 'The school motto is required',
                'vision.required' => 'The school vision is required',
                'mission.required' => 'The school mission is required',
                'email.required' => 'The school email address is required',
                'postal_address.required' => 'The school postal address is required',
                'core_values.required' => 'The school core values are required',
                'image.required' => 'The logo for the school is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the school is required',
                'initials.required' => 'The school intials is required',
                'phone_no.required' => 'The contact phone number for the school is required',
                'head.required' => 'The name of teacher heading the school is required',
                'ass_head.required' => 'The name of teacher deputizing the school head is required',
                'motto.required' => 'The school motto is required',
                'vision.required' => 'The school vision is required',
                'mission.required' => 'The school mission is required',
                'email.required' => 'The school email address is required',
                'postal_address.required' => 'The school postal address is required',
                'core_values.required' => 'The school core values are required',
                'image.required' => 'The logo for the school is required',
            ];
        }
    }
}
