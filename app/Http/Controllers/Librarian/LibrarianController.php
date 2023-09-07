<?php

namespace App\Http\Controllers\Librarian;

use App\Models\Library;
use App\Models\Book;
use App\Models\IssuedBook;
use App\Services\BookService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    protected $bookService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->middleware('auth:librarian');
        $this->middleware('banned');
        $this->middleware('librarian2fa');
        $this->bookService = $bookService;
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('librarian.librarian');
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

    public function book(Request $request)
    {
        $bookId = $request->book;

        if(is_null($bookId)){
            return back()->withErrors('Please select the title of the book first!');
        }
        $book = Book::where('id',$bookId)->first();

        return view('librarian.search.book',compact('book'));
    }

    public function bookAuthor(Request $request)
    {
        $bookAuthor = $request->book_author;

        if(is_null($bookAuthor)){
            return back()->withErrors('Please select the author of the book first!');
        }
        $book = Book::where('author',$bookAuthor)->first();

        return view('librarian.search.book_author',compact('book'));
    }
}
