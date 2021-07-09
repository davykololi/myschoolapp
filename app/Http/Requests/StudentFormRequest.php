<?php

namespace App\Http\Requests;

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
        return [
            //
            'title' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'middle_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'image' => 'required||image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
            'phone_no' => 'required|string',
            'admission_no' => 'required',
            'dob' => 'required',
            'email' => 'required|valid:email',
            'postal_address'   => 'required|exists:categories,id',
            'history' => 'required|string',
            'school_id' => 'required|string|max:100',
            'standard_id' => 'required|string|max:100',
            'intake_id' => 'required|string|max:100',
            'dormitory_id' => 'required|string|max:100',
            'admin_id' => 'required|string|max:100',
            'parent_id' => 'required|string|max:100',
            'position_student_id' => 'required|string|max:100',
            'password' => 'required|string|confirmed|max:8',
            'password_confirmation' => 'required',
        ];
    }
}
