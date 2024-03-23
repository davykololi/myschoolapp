<?php

namespace App\Http\Requests;

use App\Rules\CapitalLetter;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class StudentFormRequest extends FormRequest
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
                'password'=>['required','string','confirmed',Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
                'password_confirmation' => ['required'],
                'adm_mark' => 'required|string',
                'gender' => 'required|string',
                'phone_no' => 'required|string',
                'admission_no' => 'required',
                'dob' => 'required',
                'doa' => 'required',
                'blood_group' => 'required|string',
                'stream' => 'required|exists:streams,id',
                'intake' => 'required|exists:intakes,id',
                'parent' => 'required|exists:parents,id',
                'dormitory' => 'required',
                'position' => 'required|string',
            ];
        } else {
            return [
                'salutation' => 'required|string|max:100',
                'first_name' => 'required','string','max:100',new CapitalLetter(),
                'middle_name' => 'required','string','max:100',new CapitalLetter(),
                'last_name' => 'required','string','max:100',new CapitalLetter(),
                'email'=> 'required|string|email|max:255',
                'adm_mark' => 'required|string',
                'gender' => 'required|string',
                'phone_no' => 'required|string',
                'admission_no' => 'required',
                'dob' => 'required',
                'doa' => 'required',
                'blood_group' => 'required|string',
                'stream' => 'required|exists:streams,id',
                'intake' => 'required|exists:intakes,id',
                'parent' => 'required',
                'dormitory' => 'required',
                'position' => 'required|string',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'salutation.required' => "The student's title is required",
                'first_name.required' => "The student's fisrt name is required",
                'middle_name.required' => "The student's middle name is required",
                'last_name.required' => "The student's last name is required",
                'adm_mark.required' => 'The marks on admission is required',
                'gender.required'   => 'The gender status is required',
                'admission_no.required'   => 'The admission number is required',
                'dob.required'   => 'The date of birth is required',
                'doa.required'   => 'Admission date is required',
                'email.required'   => 'The email address is required',
                'blood_group.required'   => 'The blood group is required',
                'stream.required' => 'The stream the student belongs to is required',
                'intake.required' => 'The intake is required',
                'parent.required' => 'The parent/guardian is required',
                'dormitory.required' => 'The dormitory is required',
                'position.required' => 'The role of the student is required',
            ];
        } else {
            return [
                //
                'salutation.required' => "The student's title is required",
                'first_name.required' => "The student's fisrt name is required",
                'middle_name.required' => "The student's middle name is required",
                'last_name.required' => "The student's last name is required",
                'adm_mark.required' => 'The marks on admission is required',
                'gender.required'   => 'The gender status is required',
                'admission_no.required'   => 'The admission number is required',
                'dob.required'   => 'The date of birth is required',
                'doa.required'   => 'Admission date is required',
                'email.required'   => 'The email address is required',
                'blood_group.required'   => 'The blood group is required',
                'stream.required' => 'The stream the student belongs to is required',
                'intake.required' => 'The intake is required',
                'parent.required' => 'The parent/guardian is required',
                'dormitory.required' => 'The dormitory is required',
                'position.required' => 'The role of the student is required',
            ];
        }
    }
}
