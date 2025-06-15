<?php

namespace App\Http\Controllers\Librarian;

use Auth;
use App\Models\Student;
use App\Models\Book;
use App\Services\IssuedBookService;
use App\Http\Controllers\Controller;
use App\Models\IssuedBook;
use Illuminate\Http\Request;
use App\Http\Requests\IssuedBookFormRequest as StoreRequest;
use App\Http\Requests\IssuedBookFormRequest as UpdateRequest;

class IssuedBooksController extends Controller
{
    protected $issuedBookService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IssuedBookService $issuedBookService)
    {
        $this->middleware('auth');
        $this->middleware('role:librarian');
        $this->middleware('librarian-banned');
        $this->middleware('checktwofa');
        $this->issuedBookService = $issuedBookService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        //
        $user = Auth::user();
        $search = strtolower($request->search);
        if($user->hasRole('librarian')){
            if($search){
                $issuedBooks = IssuedBook::whereLike(['issued_date','return_date','serial_no', 'book.title', 'book.author','book.rack_no', 'book.row_no','student.admission_no'], $search)->eagerLoaded()->paginate(15);

                return view('librarian.issued-books.index',compact('issuedBooks'));
            } else {
                $issuedBooks = $this->issuedBookService->paginated();

                return view('librarian.issued-books.index',compact('issuedBooks'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $students = Student::with('user')->get();
        $books = Book::all();
        $title = 'Issue Book To Student';

        return view('librarian.issued-books.create',compact('students','books','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        $issuedBook = $this->issuedBookService->create($request);

        return back()->withSuccess('The issued book saved successfully'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IssuedBook  $issuedBook
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $issuedBook = $this->issuedBookService->getId($id);

        return view('librarian.issued-books.show',compact('issuedBook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IssuedBook  $issuedBook
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $issuedBook = $this->issuedBookService->getId($id);
        $students = Student::with('user')->get();
        $books = Book::all();
        $title = 'Edit Issued Book';

        return view('librarian.issued-books.edit',compact('issuedBook','students','books','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IssuedBook  $issuedBook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $issuedBook = $this->issuedBookService->getId($id);
        if($issuedBook){
            $this->issuedBookService->update($request,$id);

            return redirect()->route('librarian.search.student')->withSuccess('The issued book updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IssuedBook  $issuedBook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $issuedBook = $this->issuedBookService->getId($id);
        $brBook = IssuedBook::whereId($issuedBook)->firstOrFail();
        if(($issuedBook) && ($brBook->returned === 0)){
            return back()->withErrors(__('This book has not been returned, therefore can\'t be cleared.'));
        }
        if(($issuedBook) && ($brBook->returned_status === 0)){
            return redirect()->route('librarian.issued-books.index')->withErrors(__('This book returned in bad condition. To be cleared first before being deleted!!'));
        }
        if($issuedBook){
            $this->issuedBookService->delete($id);
            return back()->withSuccess('The issued book deleted successfully');
        }
    }
}
