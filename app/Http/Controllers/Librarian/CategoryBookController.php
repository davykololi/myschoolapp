<?php

namespace App\Http\Controllers\Librarian;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CategoryBook;
use Illuminate\Http\Request;

class CategoryBookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:librarian');
        $this->middleware('librarian2fa');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoryBooks = CategoryBook::get();

        return view('librarian.category-books.index',compact('categoryBooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('librarian.category-books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        CategoryBook::create($input);

        return redirect()->route('librarian.category-books.index')->withSuccess('The book category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryBook  $categoryBook
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryBook $categoryBook)
    {
        //
        return view('librarian.category-books.show',compact('categoryBook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryBook  $categoryBook
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryBook $categoryBook)
    {
        //
        return view('librarian.category-books.edit',compact('categoryBook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryBook  $categoryBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryBook $categoryBook)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $categoryBook->update($input);

        return redirect()->route('librarian.category-books.index')->withSuccess('The book category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryBook  $categoryBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryBook $categoryBook)
    {
        //
        $categoryBook->delete();

        return redirect()->route('librarian.category-books.index')->withSuccess('The book category deleted successfully!');
    }
}
