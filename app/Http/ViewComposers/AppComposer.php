<?php

namespace App\Http\ViewComposers;

use Auth;
use App\Models\School;
use Illuminate\View\View;

class AppComposer 
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */

    public function compose(View $view){
        $user = Auth::user();

        $view->with(['user'=>$user]); 
    }
}
