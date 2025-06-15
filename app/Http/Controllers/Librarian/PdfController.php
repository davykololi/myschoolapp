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

        if($school->books->isNotEmpty()){
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
    }

    public function borrowedBooks()
    {
        $issuedBooks = Issuedbook::with('book','student.stream','student.user')->get();

        if($issuedBooks->isEmpty()){
            return back()->withErrors('There are no issued books at the moment');
        }

        if($issuedBooks->isNotEmpty()){
            $school = auth()->user()->school;
            $title = 'Library Issued Books List';
            $date = date("l, F j, Y",strtotime(now()));
            $downloadTitle = $school->name." ".$title.". "."Generated on:"." ".$date." ".". The Library Management.";
            $pdf = PDF::loadView('librarian.pdf.issued_books',['issuedBooks'=>$issuedBooks,'title'=>$title,'school'=>$school,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');

            $pdf->output();
            $canvas = $pdf->getDomPDF()->getCanvas();
            $height = $canvas->get_height();
            $width = $canvas->get_width();
            $imageUrl = public_path('/storage/storage/'.$school->image);
            $canvas->set_opacity(.2,"Multiply");
            $canvas->page_text($width/5, $height/2,strtoupper('Library Issued Books'),null,50, array(0,0,0),2,2,-30);
        
            return $pdf->download($downloadTitle.'.pdf');
        }
    }

    public function issuedBooksByReturnDate(Request $request)
    {
        $school = auth()->user()->school;
        $returnDate = $request->return_date;
        $issuedBooks = Issuedbook::where('return_date',$returnDate)->eagerLoaded()->get();

        if(is_null($returnDate)){
            return back()->withErrors('Provide return date before you procced!');
        }elseif($issuedBooks->isEmpty()){
            return back()->withErrors('No books to be returned on this date!');
        }

        if($issuedBooks->isNotEmpty()){
            $dateConversion = Carbon::createFromFormat('d/m/Y', $returnDate)->format('d-m-Y');
            $title = "Library books to be returned on"." ".$returnDate;
            $t = "Library books to be returned on"." ".$dateConversion;
            $moreInquiries = ". For more inquiries, contact: ".Auth::user()->school->phone_no;
            $downloadTitle = $school->name." ".$t.$moreInquiries;
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
    }

    public function issuedBooksByDateOfIssue(Request $request)
    {
        $school = auth()->user()->school;
        $issuedDate = $request->issued_date;
        $issuedBooks = Issuedbook::where('issued_date',$issuedDate)->eagerLoaded()->get();

        if(is_null($issuedDate)){
            return back()->withErrors('Provide date of issue before you procced!');
        }elseif($issuedBooks->isEmpty()){
            return back()->withErrors('No books were issued on this date!');
        }

        if($issuedBooks->isNotEmpty()){
            $dateConversion = Carbon::createFromFormat('d/m/Y', $issuedDate)->format('d-m-Y');
            $title = 'Library Books Issued On'." ".$issuedDate;
            $t = "Library Books Issued On"." ".$dateConversion;
            $moreInquiries = ". For more inquiries, contact: ".Auth::user()->school->phone_no;
            $downloadTitle = $school->name." ".$t." ".$moreInquiries;
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

    public function issuedBooksWithElapsedTime(Request $request)
    {
        $school = auth()->user()->school;
        $elapsedTimeIssuedBooks = Issuedbook::timeElapsed()->eagerLoaded()->get();

        if($elapsedTimeIssuedBooks->isEmpty()){
            return back()->withErrors('No books with elapsed time found!');
        }

        if($elapsedTimeIssuedBooks->isNotEmpty()){
            $title = 'Issued Books Whose Return Date Is Over';
            $moreInquiries = ". For more inquiries, contact: ".Auth::user()->school->phone_no;
            $downloadTitle = $school->name." ".$title." ".$moreInquiries;
            $pdf = PDF::loadView('librarian.pdf.elapsed_time_issued_books',['elapsedTimeIssuedBooks'=>$elapsedTimeIssuedBooks,'title'=>$title,'school'=>$school,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');

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

    public function booksIssuedBetween(Request $request)
    {
        $school = auth()->user()->school;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        if(is_null($startDate) || is_null($endDate)){
            return back()->withErrors('Please select the dates before you proceed');
        }
        $issuedBooks = Issuedbook::issuedBetween($startDate,$endDate)->eagerLoaded()->get();

        if($issuedBooks->isEmpty()){
            return back()->withErrors("No books issued between"." ".$startDate." "."to"." ".$endDate);
        }

        if($issuedBooks->isNotEmpty()){
            $title ="Books issued between"." ".$startDate." "."-"." ".$endDate;
            $convertedStartDate = Carbon::createFromFormat('d/m/Y', $startDate)->format('d-m-Y');
            $convertedEndDate = Carbon::createFromFormat('d/m/Y', $endDate)->format('d-m-Y');
            $t = "Books issued between"." ".$convertedStartDate." "."-"." ".$convertedEndDate;
            $moreInquiries = ". For more inquiries, contact: ".Auth::user()->school->phone_no;
            $downloadTitle = $school->name." ".$t." ".$moreInquiries;
            $pdf = PDF::loadView('librarian.pdf.books_issued_between',['issuedBooks'=>$issuedBooks,'title'=>$title,'school'=>$school,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');

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
}
