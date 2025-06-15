<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Book;
use App\Services\BookService;
use App\Services\IssuedBookService;
use App\Services\SchoolService;
use App\Services\LibraryService;
use App\Models\CategoryBook;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;

class BookController extends Controller
{
    protected $schoolService, $bookService, $libraryService, $issuedBookService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SchoolService $schoolService, BookService $bookService, LibraryService $libraryService, IssuedBookService $issuedBookService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->bookService = $bookService;
        $this->libraryService = $libraryService;
        $this->issuedBookService = $issuedBookService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = strtolower($request->search);
        if($user->hasRole('admin')){
            if($search){
                $books = Book::whereLike(['category_book.name', 'category_book.desc', 'title', 'rack_no', 'row_no','author','units', 'library.name'], $search)->eagerLoaded()->paginate(15);

                $arrayOfBooksUnits = $this->bookService->all()->pluck('units')->toArray();
                $numberOfAllBooks = collect($arrayOfBooksUnits)->sum();
                $numberOfissuedBooks = $this->issuedBookService->all()->count();
                $numberOfAvailableBooks = $numberOfAllBooks - $numberOfissuedBooks;

                return view('admin.books.index',compact('user','books','numberOfAllBooks','numberOfissuedBooks','numberOfAvailableBooks'));
            } else {
                $books = $this->bookService->paginated();
                $arrayOfBooksUnits = $this->bookService->all()->pluck('units')->toArray();
                $numberOfAllBooks = collect($arrayOfBooksUnits)->sum();
                $numberOfissuedBooks = $this->issuedBookService->all()->count();
                $numberOfAvailableBooks = $numberOfAllBooks - $numberOfissuedBooks;

                return view('admin.books.index',compact('user','books','numberOfAllBooks','numberOfissuedBooks','numberOfAvailableBooks'));
            }
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $libraries = $this->libraryService->all();
            $bookCategories = CategoryBook::all();

            return view('admin.books.create',compact('user','libraries','bookCategories'));
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $book = $this->bookService->create($request);

            return redirect()->route('admin.books.index')->withSuccess('The Book info created successfully');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $book = $this->bookService->getId($id);
        
            return view('admin.books.show',compact('book','user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $book = $this->bookService->getId($id);
            $libraries = $this->libraryService->all();
            $bookCategories = CategoryBook::all();

            return view('admin.books.edit',compact('book','user','libraries','bookCategories'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, $id)
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $book = $this->bookService->getId($id);
            if($book){
                $this->bookService->update($request,$id);

                return redirect()->route('admin.books.index')->withSuccess('The Book info updated successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $book = $this->bookService->getId($id);
            if($book){
                $this->bookService->delete($id);

                return redirect()->route('admin.books.index')->withSuccess('The Book info deleted successfully'); 
            } 
        }
    }
}
