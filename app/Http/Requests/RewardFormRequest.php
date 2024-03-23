<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RewardFormRequest extends FormRequest
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
                'purpose' => 'required|string|max:500',
                'date' => 'required|date',
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'purpose' => 'required|string|max:500',
                'date' => 'required|date',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the reward is required',
                'purpose.required' => 'The purpose of the reward is required',
                'date.required' => 'The date of issuing the reward is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the reward is required',
                'purpose.required' => 'The purpose of the reward is required',
                'date.required' => 'The date of issuing the reward is required',
            ];
        }
    }
}
