<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\StreamService;
use App\Services\StreamHeadTeacherService;
use App\Http\Requests\StreamHeadTeacherFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StreamHeadTeacherController extends Controller
{
    protected $streamHeadTeacherService, $streamService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StreamHeadTeacherService $streamHeadTeacherService, StreamService $streamService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->streamHeadTeacherService = $streamHeadTeacherService;
        $this->streamService = $streamService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $streamHeadTeachers = $this->streamHeadTeacherService->paginated();

        return view('superadmin.stream-head-teachers.index',compact('streamHeadTeachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $streams = $this->streamService->all();

        return view('superadmin.stream-head-teachers.create',compact('streams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StreamHeadTeacherFormRequest $request)
    {
        //
        $streamHeadTeacher = $this->streamHeadTeacherService->create($request);

        return redirect()->route('superadmin.stream-head-teachers.index')->withSuccess(ucwords($streamHeadTeacher->name." ".'created successfully!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $streamHeadTeacher = $this->streamHeadTeacherService->getId($id);

        return view('superadmin.stream-head-teachers.show',compact('streamHeadTeacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $streamHeadTeacher = $this->streamHeadTeacherService->getId($id);
        $streams = $this->streamService->all();

        return view('superadmin.stream-head-teachers.edit',compact('streamHeadTeacher','streams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StreamHeadTeacherFormRequest $request, string $id)
    {
        //
        $streamHeadTeacher = $this->streamHeadTeacherService->getId($id);
        if($streamHeadTeacher){
            $this->streamHeadTeacherService->update($request,$id);

            return redirect()->route('superadmin.stream-head-teachers.index')->withSuccess(ucwords($streamHeadTeacher->name." ".'info updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $streamHeadTeacher = $this->streamHeadTeacherService->getId($id);
        if($streamHeadTeacher){
            $this->streamHeadTeacherService->delete($id);

            return redirect()->route('superadmin.stream-head-teachers.index')->withSuccess(ucwords($streamHeadTeacher->name." ".'info deleted successfully'));
        }
    }
}
