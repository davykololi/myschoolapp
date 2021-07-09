<?php

namespace App\Http\Controllers\Librarian;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibrarianProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:librarian');
    }
    
    public function librarianProfile()
    {
        $user = Auth::user();

    	return view('librarian.profile',compact('user'));
    }
}
