<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\TeacherService;
use App\Services\StaffService;
use App\Services\DepartmentService;
use App\Services\MeetingService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DeptFormRequest as StoreRequest;
use App\Http\Requests\DeptFormRequest as UpdateRequest;

class DepartmentController extends Controller
{
    protected $deptService, $teacherService, $staffService, $meetingService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DepartmentService $deptService,TeacherService $teacherService,StaffService $staffService,MeetingService $meetingService)
    {
        $this->middleware('auth:superadmin');
        $this->middleware('banned');
        $this->middleware('superadmin2fa');
        $this->deptService = $deptService;
        $this->teacherService = $teacherService;
        $this->staffService = $staffService;
        $this->meetingService = $meetingService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments = $this->deptService->all();

        return view('superadmin.departments.index',['departments'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teachers = $this->teacherService->all()->pluck('full_name','id');
        $staffs = $this->staffService->all()->pluck('full_name','id');
        $meetings = $this->meetingService->all()->pluck('name','id');

        return view('superadmin.departments.create',compact('teachers','staffs','meetings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //Store the article in DB
        //Begin the DB transaction
        DB::beginTransaction();
        try{
            $department = $this->deptService->create($request);
            if(!$department){
                DB::rollBack();
                toastr()->error(ucwords('Something went wrong. Please try again'));

                return back();
            }

            DB::commit();
            $teachers = $request->teachers;
            $department->teachers()->sync($teachers);
            $staffs = $request->staffs;
            $department->staffs()->sync($staffs);
            $meetings = $request->meetings;
            $department->meetings()->sync($meetings);
            toastr()->success(ucwords($department->name." ".'created successfully'));

            return redirect()->route('superadmin.departments.index');
        } catch(\Throwable $th){
            DB::rollBack();
            throw $th;
        }
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
        $department = $this->deptService->getId($id);
        $teachers = $this->teacherService->all()->pluck('full_name','id');
        $deptTeachers = $department->teachers;
        $staffs = $this->staffService->all()->pluck('full_name','id');
        $deptStaffs = $department->staffs;
        $meetings = $this->meetingService->all()->pluck('name','id');
        $deptMeetings = $department->meetings;

        return view('superadmin.departments.show',compact('department','teachers','deptTeachers','staffs','deptStaffs','meetings','deptMeetings'));
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
        $department = $this->deptService->getId($id);

        return view('superadmin.departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$id)
    {
        //Update the article with the id
        //Begin the DB transaction
        DB::beginTransaction();
        try{
            $department = $this->deptService->getId($id);
            if(!$department){
                DB::rollBack();
                toastr()->error(ucwords('Something went wrong. Please try again'));

                return back();
            }

            DB::commit();
            $this->deptService->update($request,$id);
            
            toastr()->success(ucwords($department->name." ".'details updated successfully'));

            return redirect()->route('superadmin.departments.index');
        } catch (\Throwable $th){
            DB::rollBack();
            throw $th;
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
        //Delete the article with image
        DB::beginTransaction();
        try{
            $department = $this->deptService->getId($id);
            if(!$department){
                DB::rollBack();
                toastr()->error(ucwords('Something went wrong. Please try again'));

                return back();
            }
            
            DB::commit();
            $this->deptService->delete($id);
            $department->teachers()->detach();
            $department->staffs()->detach();
            $department->meetings()->detach();
            toastr()->success(ucwords($department->name." ".'deleted successfully'));
            
            return redirect()->route('superadmin.departments.index');

        } catch(\Throwable $th){
            DB::rollBack();
            throw $th;
        }
    }
}
