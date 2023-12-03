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
                'name' => 'required','string','max:100',new CapitalLetter(),
                'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
                'phone_no' => 'required|string',
                'id_no' => 'required|string',
                'email' => 'required|email',
                'password'=>['required','string','confirmed',Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
                'password_confirmation' => ['required'],
            ];
        } else {
            return [
                'salutation' => 'required|string|max:100',
                'name' => 'required','string','max:100',new CapitalLetter(),
                'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
                'phone_no' => 'required|string',
                'id_no' => 'required|string',
                'email' => 'required|email',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'salutation.required' => 'The parent title is required',
                'name.required' => 'The name is required',
                'image.required' => 'The image is required',
                'phone_no.required'   => 'The phone number is required',
                'id_no.required'   => 'The id number is required',
                'email.required'   => 'The email address is required',
            ];
        } else {
            return [
                //
                'salutation.required' => 'The parent title is required',
                'name.required' => 'The name is required',
                'image.required' => 'The image is required',
                'phone_no.required'   => 'The phone number is required',
                'id_no.required'   => 'The id number is required',
                'email.required'   => 'The email address is required',
            ];
        }
    }
}
