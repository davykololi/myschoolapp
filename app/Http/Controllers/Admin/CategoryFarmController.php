<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CategoryFarm;
use Illuminate\Http\Request;

class CategoryFarmController extends Controller
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
        $categoryFarms = CategoryFarm::get();

        return view('admin.category-farms.index',compact('categoryFarms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category-farms.create');
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
        CategoryFarm::create($input);

        return redirect()->route('admin.category-farms.index')->withSuccess('The farm category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryFarm  $categoryFarm
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryFarm $categoryFarm)
    {
        //
        return view('admin.category-farms.show',compact('categoryFarm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryFarm  $categoryFarm
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryFarm $categoryFarm)
    {
        //
        return view('admin.category-farms.edit',compact('categoryFarm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryFarm  $categoryFarm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryFarm $categoryFarm)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $categoryFarm->update($input);

        return redirect()->route('admin.category-farms.index')->withSuccess('The farm category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryFarm  $categoryFarm
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryFarm $categoryFarm)
    {
        //
        $categoryFarm->delete();

        return redirect()->route('admin.category-farms.index')->withSuccess('The farm category deleted successfully!');
    }
}
