<?php

namespace App\Rules;

use App\Models\GradeSystem;
use Illuminate\Contracts\Validation\Rule;

class AllowedMark implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        
        GradeSystem::where('to_mark','=',$value)->where('from_mark','=',$value)->where('to_mark','>','from_mark')->get();

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute as mark is used.';
    }
}
