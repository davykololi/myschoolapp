<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CategoryBook;
use Illuminate\Http\Request;
use App\Http\Requests\BookCategoryFormRequest as StoreRequest;
use App\Http\Requests\BookCategoryFormRequest as UpdateRequest;

class CategoryBookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
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

        return view('admin.category-books.index',compact('categoryBooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category-books.create');
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
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        CategoryBook::create($input);

        return redirect()->route('admin.category-books.index')->withSuccess('The book category created successfully!');
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
        return view('admin.category-books.show',compact('categoryBook'));
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
        return view('admin.category-books.edit',compact('categoryBook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryBook  $categoryBook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, CategoryBook $categoryBook)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $categoryBook->update($input);

        return redirect()->route('admin.category-books.index')->withSuccess('The book category updated successfully!');
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

        return redirect()->route('admin.category-books.index')->withSuccess('The book category deleted successfully!');
    }
}
