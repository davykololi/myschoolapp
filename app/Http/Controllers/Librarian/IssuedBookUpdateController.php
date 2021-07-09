<?php

namespace App\Http\Controllers\Librarian;

use App\Models\IssuedBook;
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
    }

    public function issuedBookReturned(IssuedBook $booker) //Set issued book as Returned
    {
        if($booker->returned_status == true){
            $booker->returned = true;
            $booker->save();

            return redirect()->route('librarian.bookers.index')->withSuccess("The book retuned!");
        }  
            return redirect()->route('librarian.bookers.show',$booker->id)->withErrors("The book notyet returned!");
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
}
