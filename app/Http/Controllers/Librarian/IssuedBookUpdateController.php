<?php

namespace App\Http\Controllers\Librarian;

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
        $this->middleware('auth:librarian');
        $this->middleware('librarian2fa');
    }

    public function issuedBookReturned(IssuedBook $booker) //Set issued book as Returned
    {
        if($booker->returned_status == true){
            $booker->returned = true;
            $booker->save();

            return redirect()->back()->withSuccess("The book set as returned!");
        }  
    }

    public function issuedBookFaulty(IssuedBook $booker) //Set issued book as Returned but Faulty
    {
        if($booker->returned == true){
            $booker->returned_status = false;
            $booker->save();

            return redirect()->route('librarian.bookers.index')->withErrors("The book returned in bad condition!");
        }  
    }

    public function clearFaultyBook(IssuedBook $booker) //Set Faulty Issued Book to have been clear
    {
        if($booker->returned_status == false){
            $booker->returned_status = true;
            $booker->save();

            return redirect()->route('librarian.bookers.index')->withSuccess("The faulty book cleared successfully!");
        }  
    }

    public function bookNotyetReturned(IssuedBook $booker) //Reset book as not returned
    {
        if($booker->returned_status = true){
            $booker->returned_status = true;
            $booker->returned = false;
            $booker->save();

            return redirect()->route('librarian.bookers.index')->withErrors("The book reset as not returned!");
        }  
    }

    public function student(Request $request)
    {
        $studendId = $request->student;

        if(is_null($studendId)){
            return back()->withErrors('Please select the name first!');
        }
        $student = Student::where('id',$studendId)->first();
        $issuedBooks = IssuedBook::where(['student_id'=>$student->id])->get();

        return view('librarian.search.student',compact('student','issuedBooks'));
    }
}
