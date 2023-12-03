<?php

namespace App\Http\Requests;

use App\Rules\EmailValidation;
use App\Rules\CapitalLetter;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class AdminFormRequest extends FormRequest
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
                'salutation' => 'required|string|max:100',
                'first_name' => 'required','string','max:100',new CapitalLetter(),
                'middle_name' => 'required','string','max:100',new CapitalLetter(),
                'last_name' => 'required','string','max:100',new CapitalLetter(),
                'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
                'gender' => 'required|string|max:100',
                'phone_no' => 'required|string',
                'id_no' => 'required|string',
                'emp_no' => 'required|string',
                'dob' => 'required',
                'email' => 'required|email',
                'address'   => 'required',
                'designation'   => 'required',
                'history' => 'required',
                'password'=>['required','string','confirmed',Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
                'password_confirmation' => ['required'],
            ];
        } else {
            return [
                'salutation' => 'required|string|max:100',
                'first_name' => 'required','string','max:100',new CapitalLetter(),
                'middle_name' => 'required','string','max:100',new CapitalLetter(),
                'last_name' => 'required','string','max:100',new CapitalLetter(),
                'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
                'gender' => 'required|string|max:100',
                'phone_no' => 'required|string',
                'id_no' => 'required|string',
                'emp_no' => 'required|string',
                'dob' => 'required',
                'email' => 'required|email',
                'address'   => 'required',
                'designation'   => 'required',
                'history' => 'required',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'salutation.required' => 'The title is required',
                'first_name.required' => 'The first name is required',
                'middle_name.required' => 'The middle name is required',
                'last_name.required' => 'The last name is required',
                'image.required' => 'The image is required',
                'gender.required' => 'Gender status required',
                'phone_no.required'   => 'The phone number is required',
                'id_no.required'   => 'The id number is required',
                'emp_no.required'   => 'The employment number is required',
                'dob.required'   => 'The date of birth is required',
                'email.required'   => 'The email address is required',
                'address.required'   => 'The postal address is required',
                'designation.required'   => 'The profession is required',
                'history.required'   => 'Any information about the school adminstrator is required',
            ];
        } else {
            return [
                //
                'salutation.required' => 'The title is required',
                'first_name.required' => 'The first name is required',
                'middle_name.required' => 'The middle name is required',
                'last_name.required' => 'The last name is required',
                'image.required' => 'The image is required',
                'gender.required' => 'Gender status required',
                'phone_no.required'   => 'The phone number is required',
                'id_no.required'   => 'The id number is required',
                'emp_no.required'   => 'The employment number is required',
                'dob.required'   => 'The date of birth is required',
                'email.required'   => 'The email address is required',
                'address.required'   => 'The postal address is required',
                'designation.required'   => 'The profession is required',
                'history.required'   => 'Any information about the school adminstrator is required',
            ];
        }
    }
}
