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
                'title' => 'required|string|max:100',
                'name' => 'required','string','max:100',new CapitalLetter(),
                'adm_mark' => 'required|string',
                'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
                'phone_no' => 'required|string',
                'gender' => 'required|string',
                'admission_no' => 'required',
                'dob' => 'required',
                'doa' => 'required',
                'email' => 'required|email',
                'address'   => 'required',
                'history' => 'required|string',
                'blood_group' => 'required|exists:blood_groups,id',
                'stream' => 'required|exists:streams,id',
                'intake' => 'required|exists:intakes,id',
                'dormitory' => 'required|exists:dormitories,id',
                'parent' => 'required|exists:parents,id',
                'student_role' => 'required|exists:position_students,id',
                'password'=>['required','string','confirmed',Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
                'password_confirmation' => ['required'],
            ];
        } else {
            return [
                'title' => 'required|string|max:100',
                'name' => 'required','string','max:100',new CapitalLetter(),
                'adm_mark' => 'required|string',
                'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
                'phone_no' => 'required|string',
                'gender' => 'required|string',
                'admission_no' => 'required',
                'dob' => 'required',
                'doa' => 'required',
                'email' => 'required|email',
                'address'   => 'required',
                'history' => 'required|string',
                'blood_group' => 'required|exists:blood_groups,id',
                'stream' => 'required|exists:streams,id',
                'intake' => 'required|exists:intakes,id',
                'dormitory' => 'required|exists:dormitories,id',
                'parent' => 'required|exists:parents,id',
                'student_role' => 'required|exists:position_students,id',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'title.required' => 'The title is required',
                'name.required' => 'The student full name is required',
                'adm_mark.required' => 'The marks during admission is required',
                'image.required' => 'The image is required',
                'phone_no.required'   => 'The phone number is required',
                'gender.required'   => 'The gender status is required',
                'admission_no.required'   => 'The admission number is required',
                'dob.required'   => 'The date of birth is required',
                'doa.required'   => 'Admission date is required',
                'email.required'   => 'The email address is required',
                'address.required'   => 'The address is required',
                'history.required'   => 'More information about the student is required',
                'blood_group.required'   => 'The blood group is required',
                'stream.required' => 'The class is required',
                'intake.required' => 'The intake is required',
                'dormitory.required' => 'The dormitory is required',
                'parent.required' => 'The parent/gurdian is required',
                'student_role.required' => 'The role of the student at school is required',
            ];
        } else {
            return [
                //
                'title.required' => 'The title is required',
                'name.required' => 'The student full name is required',
                'image.required' => 'The image is required',
                'phone_no.required'   => 'The phone number is required',
                'gender.required'   => 'The gender status is required',
                'admission_no.required'   => 'The admission number is required',
                'dob.required'   => 'The date of birth is required',
                'doa.required'   => 'Admission date is required',
                'email.required'   => 'The email address is required',
                'address.required'   => 'The address is required',
                'history.required'   => 'More information about the student is required',
                'blood_group.required'   => 'The blood group is required',
                'stream.required' => 'The class is required',
                'intake.required' => 'The intake is required',
                'dormitory.required' => 'The dormitory is required',
                'parent.required' => 'The parent/gurdian is required',
                'student_role.required' => 'The role of the student at school is required',
            ];
        }
    }
}
