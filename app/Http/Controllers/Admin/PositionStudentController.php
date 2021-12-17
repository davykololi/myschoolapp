<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StudentRoleService as StudRolService;
use Illuminate\Http\Request;
use App\Http\Requests\StudRoleFormRequest as StoreRequest;
use App\Http\Requests\StudRoleFormRequest as UpdateRequest;

class PositionStudentController extends Controller
{
    protected $studRolService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudRolService $studRolService)
    {
        $this->middleware('auth:admin');
        $this->studRolService = $studRolService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $positionStudents = $this->studRolService->all();

        return view('admin.position-students.index',compact('positionStudents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.position-students.create');
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
        $positionStudent = $this->studRolService->create($request);

        return redirect()->route('admin.position-students.index')->withSuccess(ucwords($positionStudent->name." ".'role created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionStudent  $positionStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $positionStudent = $this->studRolService->getId($id);

        return view('admin.position-students.show',compact('positionStudent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionStudent  $positionStudent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $positionStudent = $this->studRolService->getId($id);

        return view('admin.position-students.edit',compact('positionStudent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionStudent  $positionStudent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $positionStudent = $this->studRolService->getId($id);
        if($positionStudent){
            $this->studRolService->update($request,$id);

            return redirect()->route('admin.position-students.index')->withSuccess(ucwords($positionStudent->name." ".'role updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionStudent  $positionStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $positionStudent = $this->studRolService->getId($id);
        if($positionStudent){
            $this->studRolService->delete($id);

            return redirect()->route('admin.position-students.index')->withSuccess(ucwords($positionStudent->name." ".'role deleted successfully!'));
        }
    }
}
