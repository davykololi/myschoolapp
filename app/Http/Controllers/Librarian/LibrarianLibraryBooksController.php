<?php

namespace App\Http\Controllers\Librarian;

use Auth;
use App\Models\Book;
use App\Services\BookService;
use App\Services\IssuedBookService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibrarianLibraryBooksController extends Controller
{
    protected $bookService, $issuedBookService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService, IssuedBookService $issuedBookService)
    {
        $this->middleware('auth');
        $this->middleware('role:librarian');
        $this->middleware('librarian-banned');
        $this->middleware('checktwofa');
        $this->bookService = $bookService;
        $this->issuedBookService = $issuedBookService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function libraryBooks(Request $request)
    {
        $user = Auth::user();
        $search = strtolower($request->search);
        if($user->hasRole('librarian')){
            if($search){
                $books = Book::whereLike(['category_book.name', 'category_book.desc', 'title', 'rack_no', 'row_no','author','units', 'library.name'], $search)->eagerLoaded()->paginate(15);

                $arrayOfBooksUnits = $this->bookService->all()->pluck('units')->toArray();
                $numberOfAllBooks = collect($arrayOfBooksUnits)->sum();
                $numberOfissuedBooks = $this->issuedBookService->all()->count();
                $numberOfAvailableBooks = $numberOfAllBooks - $numberOfissuedBooks;

                return view('librarian.books.library_books',compact('user','books','numberOfAllBooks','numberOfissuedBooks','numberOfAvailableBooks'));
            } else {
                $books = $this->bookService->paginated();
                $arrayOfBooksUnits = $this->bookService->all()->pluck('units')->toArray();
                $numberOfAllBooks = collect($arrayOfBooksUnits)->sum();
                $numberOfissuedBooks = $this->issuedBookService->all()->count();
                $numberOfAvailableBooks = $numberOfAllBooks - $numberOfissuedBooks;

                return view('librarian.books.library_books',compact('user','books','numberOfAllBooks','numberOfissuedBooks','numberOfAvailableBooks'));
            }
            
        }
    }
}
