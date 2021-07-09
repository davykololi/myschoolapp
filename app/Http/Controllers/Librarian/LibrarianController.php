<?php

namespace App\Http\Controllers\Librarian;

use App\Models\Library;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibrarianController extends Controller
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
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('librarian');
    }

    public function schoolLibraries()
    {
        $user = auth()->user();
        $school = $user->school;
        $schoolLibraries = $school->libraries;

        return view('librarian.libraries.school_libraries',compact('school','schoolLibraries'));
    }

    public function library(Library $library)
    {
        $libraryMeetings = $library->meetings;

        return view('librarian.libraries.library',compact('library','libraryMeetings'));
    }
}
