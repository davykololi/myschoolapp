<?php

namespace App\Http\ViewComposers;

use App\Models\School;
use Illuminate\View\View;

class SchoolComposer 
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */

    public function compose(View $view)
    {
        $school = School::whereId(config("constants.school_id"))->firstOrFail();

        $view->with(['school'=>$school]); 
    }
}
