<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CategorySubject;
use Illuminate\Http\Request;

class CategorySubjectController extends Controller
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
        $categorySubjects = CategorySubject::get();

        return view('admin.category-subjects.index',compact('categorySubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category-subjects.create');
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
        CategorySubject::create($input);

        return redirect()->route('admin.category-subjects.index')->withSuccess('The subject category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorySubject  $categorySubject
     * @return \Illuminate\Http\Response
     */
    public function show(CategorySubject $categorySubject)
    {
        //
        return view('admin.category-subjects.show',compact('categorySubject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategorySubject  $categorySubject
     * @return \Illuminate\Http\Response
     */
    public function edit(CategorySubject $categorySubject)
    {
        //
        return view('admin.category-subjects.edit',compact('categorySubject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorySubject  $categorySubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategorySubject $categorySubject)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $categorySubject->update($input);

        return redirect()->route('admin.category-subjects.index')->withSuccess('The subject category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorySubject  $categorySubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorySubject $categorySubject)
    {
        //
        $categorySubject->delete();

        return redirect()->route('admin.category-subjects.index')->withSuccess('The subject category deleted successfully!');
    }
}
