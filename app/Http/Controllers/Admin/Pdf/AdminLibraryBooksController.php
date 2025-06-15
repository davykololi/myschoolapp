<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Services\BookService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLibraryBooksController extends Controller
{
    protected $bookService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->bookService = $bookService;
    }
    
    public function schooLibraryBooks()
    {
        $school = Auth::user()->school;
        $books = $this->bookService->all();
        $totalNumberOfBooks = collect($this->bookService->all()->pluck('units')->toArray())->sum();
        if($books->isEmpty()){
            return back()->withErrors(ucwords('This school libraries have no books at the moment!'));
        }
        $title = "Library Books";
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('admin.pdf.school_library_books',compact('school','books','totalNumberOfBooks','title','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
