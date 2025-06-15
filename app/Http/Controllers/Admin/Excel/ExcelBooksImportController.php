<?php

namespace App\Http\Controllers\Admin\Excel;

use Session;
use App\Models\Library;
use App\Services\BookGenreService;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LibraryBooksImport\LibraryBooksExelSheetImport;
use App\Services\LibraryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExcelBooksImportController extends Controller
{
    protected $libraryService, $bookGenreService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LibraryService $libraryService, BookGenreService $bookGenreService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->libraryService = $libraryService;
        $this->bookGenreService = $this->bookGenreService;
    }

    public function importBooksForm()
    {
        $libraries = $this->libraryService->all();
        $bookGenres = $this->bookGenreService->all();

        return view('admin.excel.import_books_form',compact('libraries','bookGenres'));
    }

    public function importBooksStore(Request $request)
    {
        $libraryId = $request->library_id;
        $bookGenreId = $request->book_genre_id;

        if(($libraryId === null) || ($bookGenreId === null)){
            return back()->withErrors('Please fill in the required details before you proceed!');
        }
        
        $library = Library::whereId($libraryId)->firstOrFail();
        $bookGenre = CategoryBook::whereId($bookGenreId)->firstOrFail();

        $requestedFile = request()->file('file');
        if(empty($requestedFile)){
            return back()->withErrors('Please ensure you select the required excel sheet document before you proceed!');
        }
 
        \Excel::import(new LibraryBooksExelSheetImport($libraryId,$bookGenreId),$requestedFile);

        \Session::flash('success', $library->name." ".$bookGenre->name." ".'Books Uploaded Successfully');

        return back();
    }
}
