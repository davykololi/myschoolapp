<?php

namespace App\Http\ViewComposers;

use Auth;
use App\Models\School;
use App\Services\BookService;
use Illuminate\View\View;

class BookComposer 
{
    protected $bookService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */

    public function compose(View $view)
    {
        $user = Auth::user();
        $books = $this->bookService->all();

        $view->with(['user'=>$user,'books'=>$books]); 
    }
}
