<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Services\SubjectService;
use App\Models\Department;
use App\Models\CategorySubject;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectFormRequest as StoreRequest;
use App\Http\Requests\SubjectFormRequest as UpdateRequest;

class SubjectController extends Controller
{
    protected $subjectService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SubjectService $subjectService)
    {
        $this->middleware('auth:admin');
        $this->subjectService = $subjectService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subjects = $this->subjectService->all();

        return view('admin.subjects.index',['subjects'=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Department::all();
        $subjectCategories = CategorySubject::all();

        return view('admin.subjects.create',compact('departments','subjectCategories'));
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
        $subject = $this->subjectService->create($request);
        if(!$subject){
            return redirect()->route('admin.subjects.index')->withErrors(ucwords('Oops!!, An error occured. Try again later!'));
        }
            return redirect()->route('admin.subjects.index')->withSuccess(ucwords($subject->name." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $subject = $this->subjectService->getId($id);

        return view('admin.subjects.show',['subject'=>$subject]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subject = $this->subjectService->getId($id);
        $departments = Department::all();
        $subjectCategories = CategorySubject::all();

        return view('admin.subjects.edit',compact('subject','departments','subjectCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $subject = $this->subjectService->getId($id);
        if($subject){
            $this->subjectService->update($request,$id);

            return redirect()->route('admin.subjects.index')->withSuccess(ucwords($subject->name." ".'info updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $subject = $this->subjectService->getId($id);
        if($subject){
            $this->subjectService->delete($id);

            return redirect()->route('admin.subjects.index')->withSuccess(ucwords($subject->name." ".'info deleted successfully'));
        }
    }
}
