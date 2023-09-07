<?php

namespace App\Http\Controllers\Librarian;

use PDF;
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
        $this->middleware('auth:librarian');
        $this->middleware('banned');
        $this->middleware('librarian2fa');
    }

    public function libraryBooks(School $school)
    {
        if($school->books->isEmpty()){
            return back()->withErrors('School libraries have no books at the moment!');
        }

        $books = $school->books()->with('school','library')->get();
    	$title = 'Library Books';
    	$pdf = PDF::loadView('librarian.pdf.library_books',['school'=>$school,'books'=>$books,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper('Library Books'),null,70, array(0,0,0),2,2,-30);
        
        return $pdf->download($school->name." ".'Library Books'.'.pdf');
    }

    public function borrowedBooks()
    {
        $issuedBooks = Issuedbook::with('book','student.stream')->get();

        if($issuedBooks->isEmpty()){
            return back()->withErrors('There are no issued books at the moment');
        }

        $school = auth()->user()->school;
        $title = 'Library Issued Books';
        $pdf = PDF::loadView('librarian.pdf.borrowed_books',['issuedBooks'=>$issuedBooks,'title'=>$title,'school'=>$school])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');

        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper('Library Issued Books'),null,50, array(0,0,0),2,2,-30);
        
        return $pdf->download($school->name." ".'Issued Books'.'.pdf');
    }

    public function issuedBooksByReturnDate(Request $request)
    {
        $school = auth()->user()->school;
        $returnDate = $request->return_date;
        $issuedBooks = Issuedbook::where('return_date',$returnDate)->with('book','student.stream')->get();

        if(is_null($returnDate)){
            return back()->withErrors('Provide return date before you procced!');
        }elseif($issuedBooks->isEmpty()){
            return back()->withErrors('No books to be returned on this day!');
        }

        $title = 'Library Books To Be Returned On'." ".$returnDate;
        $pdf = PDF::loadView('librarian.pdf.issuedbooks_bydate',['issuedBooks'=>$issuedBooks,'title'=>$title,'school'=>$school])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');

        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,20, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function issuedBooksByDateOfIssue(Request $request)
    {
        $school = auth()->user()->school;
        $issuedDate = $request->issued_date;
        $issuedBooks = Issuedbook::where('issued_date',$issuedDate)->with('book','student.stream')->get();

        if(is_null($issuedDate)){
            return back()->withErrors('Provide date of issue before you procced!');
        }elseif($issuedBooks->isEmpty()){
            return back()->withErrors('No books were issued on this day!');
        }

        $title = 'Library Books Issued On'." ".$issuedDate;
        $pdf = PDF::loadView('librarian.pdf.issuedbooks_dateofissue',['issuedBooks'=>$issuedBooks,'title'=>$title,'school'=>$school])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');

        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,20, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }
}
