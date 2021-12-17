<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Services\TeacherRoleService as TechRoService;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRoleFormRequest as StoreRequest;
use App\Http\Requests\TeacherRoleFormRequest as UpdateRequest;

class PositionTeacherController extends Controller
{
    protected $techRoService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TechRoService $techRoService)
    {
        $this->middleware('auth:superadmin');
        $this->techRoService = $techRoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $positionTeachers = $this->techRoService->all();

        return view('superadmin.position-teachers.index',compact('positionTeachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.position-teachers.create');
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
        $positionTeacher = $this->techRoService->create($request);

        return redirect()->route('superadmin.position-teachers.index')->withSuccess(ucwords($positionTeacher->name." ".'role created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionTeacher  $positionTeacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $positionTeacher = $this->techRoService->getId($id);

        return view('superadmin.position-teachers.show',compact('positionTeacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionTeacher  $positionTeacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $positionTeacher = $this->techRoService->getId($id);

        return view('superadmin.position-teachers.edit',compact('positionTeacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionTeacher  $positionTeacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $positionTeacher = $this->techRoService->getId($id);
        if($positionTeacher){
            $this->techRoService->update($request,$id);

            return redirect()->route('superadmin.position-teachers.index')->withSuccess(ucwords($positionTeacher->name." ".'role updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionTeacher  $positionTeacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $positionTeacher = $this->techRoService->getId($id);
        if($positionTeacher){
            $this->techRoService->delete($id);

            return redirect()->route('superadmin.position-teachers.index')->withSuccess(ucwords($positionTeacher->name." ".'role deleted successfully!'));
        }
    }
}
