<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CategoryHall;
use Illuminate\Http\Request;

class CategoryHallController extends Controller
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
        $categoryHalls = CategoryHall::get();

        return view('admin.category-halls.index',compact('categoryHalls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category-halls.create');
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
        CategoryHall::create($input);

        return redirect()->route('admin.category-halls.index')->withSuccess('The hall category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryHall  $categoryHall
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryHall $categoryHall)
    {
        //
        return view('admin.category-halls.show',compact('categoryHall'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryHall  $categoryHall
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryHall $categoryHall)
    {
        //
        return view('admin.category-halls.edit',compact('categoryHall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryHall  $categoryHall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryHall $categoryHall)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $categoryHall->update($input);

        return redirect()->route('admin.category-halls.index')->withSuccess('The hall category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryHall  $categoryHall
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryHall $categoryHall)
    {
        //
        $categoryHall->delete();

        return redirect()->route('admin.category-halls.index')->withSuccess('The hall category deleted successfully!');
    }
}
