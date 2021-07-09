<?php

namespace App\Http\Controllers\Librarian;

use Auth;
use App\Models\Book;
use App\Models\School;
use App\Models\Library;
use App\Models\CategoryBook;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $school = $user->school;
        $books = $school->books()->with('library','school')->get();

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
        $schools = School::all();
        $libraries = Library::all();
        $bookCategories = CategoryBook::all();

        return view('librarian.books.create',compact('user','schools','libraries','bookCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $input['school_id'] = $request->school;
        $input['library_id'] = $request->library;
        $input['category_book_id'] = $request->book_category;
        Book::create($input);

        return redirect()->route('librarian.books.index')->withSuccess('The Book info created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
        $user = Auth::user();

        return view('librarian.books.show',compact('book','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        $user = Auth::user();
        $schools = School::all();
        $libraries = Library::all();
        $bookCategories = CategoryBook::all();

        return view('librarian.books.edit',compact('book','user','schools','libraries','bookCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
        $input = $request->all();
        $input['school_id'] = $request->school;
        $input['library_id'] = $request->library;
        $input['category_book_id'] = $request->book_category;
        $book->update($input);

        return redirect()->route('librarian.books.index')->withSuccess('The Book info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();

        return redirect()->route('librarian.books.index')->withSuccess('The Book info deleted successfully'); 
    }
}
