<?php

namespace App\Http\Controllers\Admin;

use App\Services\StaffService;
use App\Models\Admin;
use App\Models\BloodGroup;
use App\Services\StaffRoleService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StaffFormRequest as StoreRequest;
use App\Http\Requests\StaffFormRequest as UpdateRequest;

class StaffController extends Controller
{
    protected $staffService,$staffRoleService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StaffService $staffService,StaffRoleService $staffRoleService)
    {
        $this->middleware('auth:admin');
        $this->staffService = $staffService;
        $this->staffRoleService = $staffRoleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $staffs = $this->staffService->all();

        return view('admin.staffs.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $staffRoles = $this->staffRoleService->all();
        $bloodGroups = BloodGroup::all();

        return view('admin.staffs.create',compact('staffRoles','bloodGroups'));
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
        $staff = $this->staffService->create($request);

        return redirect()->route('admin.staffs.index')->withSuccess(ucwords($staff->name." ".'created successfully'));
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
        $staff = $this->staffService->getId($id);

        return view('admin.staffs.show',['staff'=>$staff]);
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
        $staff = $this->staffService->getId($id);
        $staffRoles = $this->staffRoleService->all();
        $bloodGroups = BloodGroup::all();

        return view('admin.staffs.edit',compact('staff','staffRoles','bloodGroups'));
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
        $staff = $this->staffService->getId($id);
        if($staff){
            Storage::delete('public/storage/'.$staff->image);
            $this->staffService->update($request,$id);

            return redirect()->route('admin.staffs.index')->withSuccess(ucwords($staff->name." ".'updated successfully'));
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
        $staff = $this->staffService->getId($id);
        if($staff){
            Storage::delete('public/storage/'.$staff->image);
            $this->staffService->delete($id);

            return redirect()->route('admin.staffs.index')->withSuccess(ucwords($staff->name." ".'deleted successfully'));
        }
    }
}
