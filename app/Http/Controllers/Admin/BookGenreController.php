<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Services\BookGenreService;
use Illuminate\Http\Request;
use App\Http\Requests\BookGenreFormRequest as StoreRequest;
use App\Http\Requests\BookGenreFormRequest as UpdateRequest;

class BookGenreController extends Controller
{
    protected $bookGenreService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookGenreService $bookGenreService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->bookGenreService = $bookGenreService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $bookGenres = $this->bookGenreService->paginated();

            return view('admin.book-genres.index',compact('bookGenres'));
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
        $user = Auth::user();
        if($user->hasRole('admin')){
            return view('admin.book-genres.create');
        } 
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
        $user = Auth::user();
        if($user->hasRole('admin')){
            $bookGenre = $this->bookGenreService->create($request);

            return redirect()->route('admin.book-genres.index')->withSuccess($bookGenre->name." ".'book genre created successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryBook  $categoryBook
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $bookGenre = $this->bookGenreService->getId($id);

            return view('admin.book-genres.show',compact('bookGenre'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryBook  $categoryBook
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $bookGenre = $this->bookGenreService->getId($id);

            return view('admin.book-genres.edit',compact('bookGenre'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryBook  $categoryBook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $bookGenre = $this->bookGenreService->getId($id);
            if($bookGenre){
                $this->bookGenreService->update($request,$id);

                return redirect()->route('admin.book-genres.index')->withSuccess($bookGenre->name." ".'book genre updated successfully!');
            }
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryBook  $categoryBook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $bookGenre = $this->bookGenreService->getId($id);
            if($bookGenre){
                $this->bookGenreService->delete($id);

                return redirect()->route('admin.category-books.index')->withSuccess('The book category deleted successfully!');
            }
        }
    }
}
