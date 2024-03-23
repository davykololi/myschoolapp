<?php

namespace App\Http\Requests;

use App\Rules\CapitalLetter;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class ParentFormRequest extends FormRequest
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
                'email'=> 'required|string|email|max:255|unique:users',
                'phone_no' => 'required|string',
                'id_no' => 'required|string',
                'gender' => 'required|string|max:100',
                'current_address'   => 'required|string|max:255',
                'permanent_address' => 'required|string|max:255',
                'password'=>['required','string','confirmed',Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
                'password_confirmation' => ['required'],
            ];
        } else {
            return [
                'salutation' => 'required|string|max:100',
                'first_name' => 'required','string','max:100',new CapitalLetter(),
                'middle_name' => 'required','string','max:100',new CapitalLetter(),
                'last_name' => 'required','string','max:100',new CapitalLetter(),
                'email'=> 'required|string|email|max:255',
                'phone_no' => 'required|string',
                'id_no' => 'required|string',
                'gender' => 'required|string|max:100',
                'current_address'   => 'required|string|max:255',
                'permanent_address' => 'required|string|max:255',
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
                'gender.required' => 'The gender status is required',
                'phone_no.required'   => 'The phone number is required',
                'id_no.required'   => 'The id number is required',
                'email.required'   => 'The email address is required',
                'current_address.required'   => 'The current postal address is required',
                'permanent_address.required'   => 'The permanent postal address is required',
            ];
        } else {
            return [
                //
                'salutation.required' => 'The title is required',
                'first_name.required' => 'The first name is required',
                'middle_name.required' => 'The middle name is required',
                'last_name.required' => 'The last name is required',
                'gender.required' => 'The gender status is required',
                'phone_no.required'   => 'The phone number is required',
                'id_no.required'   => 'The id number is required',
                'email.required'   => 'The email address is required',
                'current_address.required'   => 'The current postal address is required',
                'permanent_address.required'   => 'The permanent postal address is required',
            ];
        }
    }
}
