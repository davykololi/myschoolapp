<?php

namespace App\Http\Controllers\Librarian;

use Auth;
use App\Services\BookService;
use App\Services\SchoolService;
use App\Services\LibraryService;
use App\Models\CategoryBook;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;

class BookController extends Controller
{
    protected $schoolService, $bookService, $libraryService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SchoolService $schoolService, BookService $bookService, LibraryService $libraryService)
    {
        $this->middleware('auth:librarian');
        $this->middleware('banned');
        $this->middleware('librarian2fa');
        $this->bookService = $bookService;
        $this->libraryService = $libraryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $school = $user->school;
        $books = $this->bookService->all();

        return view('librarian.books.index',compact('user','books'));
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
        $libraries = $this->libraryService->all();
        $bookCategories = CategoryBook::all();

        return view('librarian.books.create',compact('user','libraries','bookCategories'));
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
        $book = $this->bookService->create($request);

        return redirect()->route('librarian.books.index')->withSuccess('The Book info created successfully');
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
        $book = $this->bookService->getId($id);
        $user = Auth::user();

        return view('librarian.books.show',compact('book','user'));
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
        $book = $this->bookService->getId($id);
        $user = Auth::user();
        $libraries = $this->libraryService->all();
        $bookCategories = CategoryBook::all();

        return view('librarian.books.edit',compact('book','user','libraries','bookCategories'));
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
        $book = $this->bookService->getId($id);
        if($book){
            $this->bookService->update($request,$id);

            return redirect()->route('librarian.books.index')->withSuccess('The Book info updated successfully');
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
        $book = $this->bookService->getId($id);
        if($book){
            $this->bookService->delete($id);

            return redirect()->route('librarian.books.index')->withSuccess('The Book info deleted successfully'); 
        } 
    }
}
