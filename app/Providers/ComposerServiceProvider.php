<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }

    public function boot()
    {
        //
        View::composer(
            'layouts.matron',
            'App\Http\ViewComposers\AppComposer'
        );

        View::composer(
            'layouts.admin',
            'App\Http\ViewComposers\AppComposer'
        );

        View::composer(
            'layouts.librarian',
            'App\Http\ViewComposers\AppComposer'
        );

        View::composer(
            'layouts.teacher',
            'App\Http\ViewComposers\AppComposer'
        );

        View::composer(
            'layouts.student',
            'App\Http\ViewComposers\AppComposer'
        );

        View::composer(
            'layouts.parent',
            'App\Http\ViewComposers\AppComposer'
        );

        View::composer(
            'ext.student-search-form',
            'App\Http\ViewComposers\AppComposer'
        );

        View::composer(
            'layouts.staff',
            'App\Http\ViewComposers\AppComposer'
        );

        View::composer(
            'ext.librarian-book-search',
            'App\Http\ViewComposers\BookComposer'
        );

        View::composer(
            'ext.librarian-bookauthor-search',
            'App\Http\ViewComposers\BookComposer'
        );

        View::composer(
            'ext.librarian-search-student',
            'App\Http\ViewComposers\AppComposer'
        );

        View::composer(
            'ext.staff-search-student',
            'App\Http\ViewComposers\StaffStudentComposer'
        );
    }
}
