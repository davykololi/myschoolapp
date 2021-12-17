<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ExamCatService as ExamCatService;
use Illuminate\Http\Request;
use App\Http\Requests\ExamCatFormRequest as StoreRequest;
use App\Http\Requests\ExamCatFormRequest as UpdateRequest;

class CategoryExamController extends Controller
{
    protected $examCatService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ExamCatService $examCatService)
    {
        $this->middleware('auth:admin');
        $this->examCatService = $examCatService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoryExams = $this->examCatService->all();

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
    public function store(StoreRequest $request)
    {
        //
        $categoryExam = $this->examCatService->create($request);

        return redirect()->route('admin.category-exams.index')->withSuccess(ucwords($categoryExam->name." ".'category created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryExam  $categoryExam
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $categoryExam = $this->examCatService->getId($id);
        if(!$categoryExam){
            return back()->with('error','Not Found');
        }
        return view('admin.category-exams.show',compact('categoryExam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryExam  $categoryExam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categoryExam = $this->examCatService->getId($id);
        if(!$categoryExam){
            return back()->with('error','Not Found');
        }
        return view('admin.category-exams.edit',compact('categoryExam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryExam  $categoryExam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $categoryExam = $this->examCatService->getId($id);
        if($categoryExam){
            $this->examCatService->update($request,$id);

            return redirect()->route('admin.category-exams.index')->withSuccess(ucwords($categoryExam->name." ".'category updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryExam  $categoryExam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categoryExam = $this->examCatService->getId($id);
        if($categoryExam){
            $this->examCatService->delete($id);

            return redirect()->route('admin.category-exams.index')->withSuccess(ucwords($categoryExam->name." ".'category deleted successfully!'));
        }
    }
}
