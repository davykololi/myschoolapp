<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SubjectCatService as SubjCatService;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectCatFormRequest as StoreRequest;
use App\Http\Requests\SubjectCatFormRequest as UpdateRequest;

class CategorySubjectController extends Controller
{
    protected $subjCatService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SubjCatService $subjCatService)
    {
        $this->middleware('auth:admin');
        $this->subjCatService = $subjCatService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorySubjects = $this->subjCatService->all();

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
    public function store(StoreRequest $request)
    {
        //
        $categorySubject = $this->subjCatService->create($request);

        return redirect()->route('admin.category-subjects.index')->withSuccess(ucwords($categorySubject->name." ".'category created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorySubject  $categorySubject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $categorySubject = $this->subjCatService->getId($id);

        return view('admin.category-subjects.show',compact('categorySubject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategorySubject  $categorySubject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categorySubject = $this->subjCatService->getId($id);

        return view('admin.category-subjects.edit',compact('categorySubject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorySubject  $categorySubject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $categorySubject = $this->subjCatService->getId($id);
        if($categorySubject){
            $this->subjCatService->update($request,$id);

            return redirect()->route('admin.category-subjects.index')->withSuccess(ucwords($categorySubject->name." ".'category updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorySubject  $categorySubject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categorySubject = $this->subjCatService->getId($id);
        if($categorySubject){
            $this->subjCatService->delete($id);

            return redirect()->route('admin.category-subjects.index')->withSuccess(ucwords($categorySubject->name." ".'deleted created successfully!'));
        }
    }
}
