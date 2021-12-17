<?php

namespace App\Http\Requests;

use App\Rules\CapitalLetter;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class StaffFormRequest extends FormRequest
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
                'title' => 'required|string|max:100',
                'name' => 'required','string','max:100',new CapitalLetter(),
                'gender' => 'required|string|max:100',
                'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
                'phone_no' => 'required|string',
                'id_no' => 'required|string',
                'emp_no' => 'required|string',
                'dob' => 'required',
                'email' => 'required|email',
                'address'   => 'required',
                'blood_group' => 'required|exists:blood_groups,id',
                'designation'   => 'required',
                'history' => 'required',
                'staff_role' => 'required',
                'password'=>['required','string','confirmed',Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
                'password_confirmation' => ['required'],
            ];
        } else {
            return [
                'title' => 'required|string|max:100',
                'name' => 'required','string','max:100',new CapitalLetter(),
                'gender' => 'required|string|max:100',
                'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
                'phone_no' => 'required|string',
                'id_no' => 'required|string',
                'emp_no' => 'required|string',
                'dob' => 'required',
                'email' => 'required|email',
                'address'   => 'required',
                'blood_group' => 'required|exists:blood_groups,id',
                'designation'   => 'required',
                'history' => 'required',
                'staff_role' => 'required',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'title.required' => 'The title is required',
                'name.required' => 'The full name is required',
                'gender.required' => 'The gender status is required',
                'image.required' => 'The image is required',
                'phone_no.required'   => 'The phone number is required',
                'id_no.required'   => 'The ID number is required',
                'emp_no.required'   => 'The employment number is required',
                'dob.required'   => 'The date of birth is required',
                'email.required'   => 'The email address is required',
                'address.required'   => 'The postal address is required',
                'blood_group.required'   => 'The blood group is required',
                'designation.required'   => 'The profession is required',
                'history.required'   => 'More information about the subordnade staff is required',
                'staff_role.required'   => 'The role is required',
            ];
        } else {
            return [
                //
                'title.required' => 'The title is required',
                'name.required' => 'The full name is required',
                'gender.required' => 'The gender status is required',
                'image.required' => 'The image is required',
                'phone_no.required'   => 'The phone number is required',
                'id_no.required'   => 'The ID number is required',
                'emp_no.required'   => 'The employment number is required',
                'dob.required'   => 'The date of birth is required',
                'email.required'   => 'The email address is required',
                'address.required'   => 'The postal address is required',
                'blood_group.required'   => 'The blood group is required',
                'designation.required'   => 'The profession is required',
                'history.required'   => 'More information about the subordnade staff is required',
                'staff_role.required'   => 'The role is required',
            ];
        }
    }
}
