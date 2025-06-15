<?php

namespace App\Http\Controllers\Librarian;

use App\Models\Book;
use App\Models\IssuedBook;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IssuedBookUpdateController extends Controller
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

    public function issuedBookReturned(IssuedBook $issuedBook) //Set issued book as Returned
    {
        if($issuedBook->returned_status === true){
            $issuedBook->returned === true;
            $issuedBook->save();

            return back()->withSuccess("The book set as returned!");
        }  
    }

    public function issuedBookFaulty(IssuedBook $issuedBook) //Set issued book as Returned but Faulty
    {
        if($issuedBook->returned === true){
            $issuedBook->returned_status === false;
            $issuedBook->save();

            return redirect()->route('librarian.issued-books.index')->withErrors("The book returned in bad condition!");
        }  
    }

    public function clearFaultyBook(IssuedBook $issuedBook) //Set Faulty Issued Book to have been clear
    {
        if($issuedBook->returned_status === false){
            $issuedBook->returned_status === true;
            $issuedBook->save();

            return redirect()->route('librarian.issued-books.index')->withSuccess("The faulty book cleared successfully!");
        }  
    }

    public function bookNotyetReturned(IssuedBook $issuedBook) //Reset book as not returned
    {
        if($issuedBook->returned_status === true){
            $issuedBook->returned_status === true;
            $issuedBook->returned === false;
            $issuedBook->save();

            return redirect()->route('librarian.issued-books.index')->withErrors("The book reset as not returned!");
        }  
    }

    public function student(Request $request)
    {
        $studendId = $request->student_id;

        if(is_null($studendId)){
            return back()->withErrors('Please select the name first!');
        }
        $student = Student::where('id',$studendId)->first();
        $books = Book::all();
        $issuedBooks = IssuedBook::where(['student_id'=>$student->id])->get();

        return view('librarian.search.student',compact('student','books','issuedBooks'));
    }
}
