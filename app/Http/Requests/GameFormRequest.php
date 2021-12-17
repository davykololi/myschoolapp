<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameFormRequest extends FormRequest
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
                'game_category' => 'required|exists:category_games,id', 
            ];
        } else {
            return [
                'name' => 'required|string|max:100',
                'game_category' => 'required|exists:category_games,id',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                //
                'name.required' => 'The name of the game is required',
                'game_category.required' => 'The category the game belongs to is required',
            ];
        } else {
            return [
                //
                'name.required' => 'The name of the game is required',
                'game_category.required' => 'The category the game belongs to is required',
            ];
        }
    }
}
