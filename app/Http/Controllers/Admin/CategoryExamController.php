<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CategoryExam;
use Illuminate\Http\Request;

class CategoryExamController extends Controller
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
        $categoryExams = CategoryExam::get();

        return view('admin.category-exams.index',compact('categoryExams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category-exams.create');
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
        CategoryExam::create($input);

        return redirect()->route('admin.category-exams.index')->withSuccess('The exam category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryExam  $categoryExam
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryExam $categoryExam)
    {
        //
        return view('admin.category-exams.show',compact('categoryExam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryExam  $categoryExam
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryExam $categoryExam)
    {
        //
        return view('admin.category-exams.edit',compact('categoryExam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryExam  $categoryExam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryExam $categoryExam)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $categoryExam->update($input);

        return redirect()->route('admin.category-exams.index')->withSuccess('The exam category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryExam  $categoryExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryExam $categoryExam)
    {
        //
        $categoryExam->delete();

        return redirect()->route('admin.category-exams.index')->withSuccess('The exam category deleted successfully!');
    }
}
