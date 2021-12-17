<?php

namespace App\Http\Controllers\Admin;

use App\Services\StreamService;
use App\Services\TeacherService;
use App\Services\SubjectService;
use App\Http\Controllers\Controller;
use App\Services\StdSubjectService;
use Illuminate\Http\Request;
use App\Http\Requests\StdSubjectFormRequest as StoreRequest;
use App\Http\Requests\StdSubjectFormRequest as UpdateRequest;

class StandardSubjectController extends Controller
{
    protected $stdSubjectService,$streamService,$teacherService,$subjectService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StdSubjectService $stdSubjectService,StreamService $streamService,TeacherService $teacherService,SubjectService $subjectService)
    {
        $this->middleware('auth:admin');
        $this->stdSubjectService = $stdSubjectService;
        $this->streamService = $streamService;
        $this->teacherService = $teacherService;
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
        $subs = $this->stdSubjectService->all();

        return view('admin.subs.index',compact('subs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subjects = $this->subjectService->all();
        $streams = $this->streamService->all();
        $teachers = $this->teacherService->all();

        return view('admin.subs.create',compact('subjects','streams','teachers'));
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
        $sub = $this->stdSubjectService->create($request);

        return redirect()->route('admin.subs.index')->withSuccess(ucwords($sub->desc." ".'subject created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StandardSubject  $standardSubject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $sub = $this->stdSubjectService->getId($id);

        return view('admin.subs.show',compact('sub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StandardSubject  $standardSubject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sub = $this->stdSubjectService->getId($id);
        $subjects = $this->subjectService->all();
        $streams = $this->streamService->all();
        $teachers = $this->teacherService->all();

        return view('admin.subs.edit',compact('sub','subjects','streams','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StandardSubject  $standardSubject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,  $id)
    {
        //
        $sub = $this->stdSubjectService->getId($id);
        if($sub){
            $this->stdSubjectService->update($request,$id);

            return redirect()->route('admin.subs.index')->withSuccess(ucwords($sub->desc." ".'subject updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StandardSubject  $standardSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sub = $this->stdSubjectService->getId($id);
        if($sub){
            $this->stdSubjectService->delete($id);

            return redirect()->route('admin.subs.index')->withSuccess(ucwords($sub->desc." ".'subject deleted successfully'));
        }
    }
}
