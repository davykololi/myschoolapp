<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CategoryField;
use Illuminate\Http\Request;

class CategoryFieldController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoryFields = CategoryField::get();

        return view('admin.category-fields.index',compact('categoryFields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category-fields.create');
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
        CategoryField::create($input);

        return redirect()->route('admin.category-fields.index')->withSuccess('The field category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryField  $categoryField
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryField $categoryField)
    {
        //
        return view('admin.category-fields.show',compact('categoryField'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryField  $categoryField
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryField $categoryField)
    {
        //
        return view('admin.category-fields.edit',compact('categoryField'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryField  $categoryField
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryField $categoryField)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $categoryField->update($input);

        return redirect()->route('admin.category-fields.index')->withSuccess('The field category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryField  $categoryField
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryField $categoryField)
    {
        //
        $categoryField->delete();

        return redirect()->route('admin.category-fields.index')->withSuccess('The field category deleted successfully!');
    }
}
