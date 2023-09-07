<?php

namespace App\Http\Controllers\Librarian;

use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookExportController extends Controller
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

    public function exportBooks()
    {
    	return Excel::download(new BooksExport,'books.xlsx');
    }
}
