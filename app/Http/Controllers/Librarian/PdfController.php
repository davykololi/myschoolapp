<?php

namespace App\Http\Controllers\Librarian;

use PDF;
use Auth;
use Carbon\Carbon;
use App\Models\School;
use App\Models\Book;
use App\Models\Issuedbook;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PdfController extends Controller
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

    public function libraryBooks()
    {
        $school = Auth::user()->school;
        if($school->books->isEmpty()){
            return back()->withErrors('School libraries have no books at the moment!');
        }

        $books = $school->books()->with('school','library')->get();
    	$title = 'Library Books';
        $downloadTitle = $school->name." ".$title;
    	$pdf = PDF::loadView('librarian.pdf.library_books',['school'=>$school,'books'=>$books,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper('Library Books'),null,70, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function borrowedBooks()
    {
        $issuedBooks = Issuedbook::with('book','student.stream','student.user')->get();

        if($issuedBooks->isEmpty()){
            return back()->withErrors('There are no issued books at the moment');
        }

        $school = auth()->user()->school;
        $title = 'Library Issued Books';
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('librarian.pdf.borrowed_books',['issuedBooks'=>$issuedBooks,'title'=>$title,'school'=>$school,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');

        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper('Library Issued Books'),null,50, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function issuedBooksByReturnDate(Request $request)
    {
        $school = auth()->user()->school;
        $returnDate = $request->return_date;
        $issuedBooks = Issuedbook::where('return_date',$returnDate)->with('book','student.stream','student.user')->get();

        if(is_null($returnDate)){
            return back()->withErrors('Provide return date before you procced!');
        }elseif($issuedBooks->isEmpty()){
            return back()->withErrors('No books to be returned on this day!');
        }

        $title = 'Library Books To Be Returned On'." ".$returnDate;
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('librarian.pdf.issuedbooks_by_returndate',['issuedBooks'=>$issuedBooks,'title'=>$title,'school'=>$school,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');

        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,20, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function issuedBooksByDateOfIssue(Request $request)
    {
        $school = auth()->user()->school;
        $issuedDate = $request->issued_date;
        $issuedBooks = Issuedbook::where('issued_date',$issuedDate)->with('book','student.stream','student.user')->get();

        if(is_null($issuedDate)){
            return back()->withErrors('Provide date of issue before you procced!');
        }elseif($issuedBooks->isEmpty()){
            return back()->withErrors('No books were issued on this day!');
        }

        $title = 'Library Books Issued On'." ".$issuedDate;
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('librarian.pdf.issuedbooks_dateofissue',['issuedBooks'=>$issuedBooks,'title'=>$title,'school'=>$school,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');

        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,20, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
