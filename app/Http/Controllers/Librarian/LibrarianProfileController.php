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
        $this->middleware('auth');
        $this->middleware('role:librarian');
        $this->middleware('librarian-banned');
        $this->middleware('checktwofa');
    }
    
    public function librarianProfile()
    {
        $user = Auth::user();

    	return view('librarian.profile',compact('user'));
    }
}
