<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccFormRequest extends FormRequest
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
                'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
                'gender' => 'required|string|max:100',
                'phone_no' => 'required|string',
                'position' => 'required|string',
                'id_no' => 'required|string',
                'emp_no' => 'required|string',
                'dob' => 'required',
                'current_address'   => 'required',
                'permanent_address'   => 'required',
                'designation'   => 'required',
                'history' => 'required',
                'blood_group' => 'required',
            ];
        } else {
            return [
                'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
                'gender' => 'required|string|max:100',
                'phone_no' => 'required|string',
                'position' => 'required|string',
                'id_no' => 'required|string',
                'emp_no' => 'required|string',
                'dob' => 'required',
                'current_address'   => 'required',
                'permanent_address'   => 'required',
                'designation'   => 'required',
                'history' => 'required',
                'blood_group' => 'required',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'image.required' => 'The image is required',
                'gender.required' => 'The gender status is required',
                'phone_no.required'   => 'The phone number is required',
                'position.required'   => 'The position held is required',
                'id_no.required'   => 'The id number is required',
                'emp_no.required'   => 'The employment number is required',
                'dob.required'   => 'The date of birth is required',
                'email.required'   => 'The email address is required',
                'current_address.required'   => 'The current postal address is required',
                'permanent_address.required'   => 'The permanent postal address is required',
                'blood_group.required'   => 'The blood group is required',
                'designation.required'   => 'The accountant profession is required',
                'history.required'   => 'More information about the accountant is required',
            ];
        } else {
            return [
                //
                'image.required' => 'The image is required',
                'gender.required' => 'The gender status is required',
                'phone_no.required'   => 'The phone number is required',
                'position.required'   => 'The position held is required',
                'id_no.required'   => 'The id number is required',
                'emp_no.required'   => 'The employment number is required',
                'dob.required'   => 'The date of birth is required',
                'email.required'   => 'The email address is required',
                'current_address.required'   => 'The current postal address is required',
                'permanent_address.required'   => 'The permanent postal address is required',
                'blood_group.required'   => 'The blood group is required',
                'designation.required'   => 'The accountant profession is required',
                'history.required'   => 'More information about the accountant is required',
            ];
        }
    }
}
