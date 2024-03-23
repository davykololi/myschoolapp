<?php

namespace App\Http\Controllers\Librarian;

use App\Exports\IssuedBooksExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExcelController extends Controller
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

    public function exportIssuedBooks()
    {
    	return Excel::download(new IssuedBooksExport(),'issued books.xlsx');
    }
}
