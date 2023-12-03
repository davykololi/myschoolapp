<?php

namespace App\Http\Controllers\Librarian;

use App\Models\Student;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Models\IssuedBook;
use Illuminate\Http\Request;

class IssuedBooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:librarian');
        $this->middleware('banned');
        $this->middleware('librarian2fa');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookers = IssuedBook::with('student','book')->get();

        return view('librarian.bookers.index',compact('bookers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $students = Student::all();
        $books = Book::all();

        return view('librarian.bookers.create',compact('students','books'));
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
        $input['student_id'] = $request->student;
        $input['book_id'] = $request->book;
        IssuedBook::create($input);

        return redirect()->route('librarian.bookers.index')->withSuccess('The issued book saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IssuedBook  $issuedBook
     * @return \Illuminate\Http\Response
     */
    public function show(IssuedBook $booker)
    {
        //
        return view('librarian.bookers.show',compact('booker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IssuedBook  $issuedBook
     * @return \Illuminate\Http\Response
     */
    public function edit(IssuedBook $booker)
    {
        //
        $students = Student::all();
        $books = Book::all();

        return view('librarian.bookers.edit',compact('booker','students','books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IssuedBook  $issuedBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IssuedBook $booker)
    {
        //
        $input = $request->all();
        $input['student_id'] = $request->student;
        $input['book_id'] = $request->book;
        $booker->update($input);

        return redirect()->route('librarian.bookers.index')->withSuccess('The issued book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IssuedBook  $issuedBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(IssuedBook $booker)
    {
        //
        if($booker->returned == 0){
            return redirect()->route('librarian.bookers.index')->withErrors(__('This book has not been returned, therefore can\'t be deleted.'));
        }
        if($booker->returned_status == 0){
            return redirect()->route('librarian.bookers.index')->withErrors(__('This book returned in bad condition. To be cleared first before being deleted!!'));
        }
        $booker->delete();

        return redirect()->route('librarian.bookers.index')->withSuccess('The issued book deleted successfully');
    }
}
