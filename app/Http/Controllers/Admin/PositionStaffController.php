<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StaffRoleService as SubStService;
use Illuminate\Http\Request;
use App\Http\Requests\StaffRolFormRequest as StoreRequest;
use App\Http\Requests\StaffRolFormRequest as UpdateRequest;

class PositionStaffController extends Controller
{
    protected $subStService;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SubStService $subStService)
    {
        $this->middleware('auth:admin');
        $this->subStService = $subStService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $positionStaffs = $this->subStService->all();

        return view('admin.position-staffs.index',compact('positionStaffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.position-staffs.create');
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
        $positionStaff = $this->subStService->create($request);

        return redirect()->route('admin.position-staffs.index')->withSuccess(ucwords($positionStaff->name." ".'role created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionStaff  $positionStaff
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $positionStaff = $this->subStService->getId($id);

        return view('admin.position-staffs.show',compact('positionStaff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionStaff  $positionStaff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $positionStaff = $this->subStService->getId($id);

        return view('admin.position-staffs.edit',compact('positionStaff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionStaff  $positionStaff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $positionStaff = $this->subStService->getId($id);
        if($positionStaff){
            $this->subStService->update($request,$id);

            return redirect()->route('admin.position-staffs.index')->withSuccess(ucwords($positionStaff->name." ".'role updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionStaff  $positionStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $positionStaff = $this->subStService->getId($id);
        if($positionStaff){
            $this->subStService->delete($id);

            return redirect()->route('admin.position-staffs.index')->withSuccess(ucwords($positionStaff->name." ".'role deleted successfully!'));
        }
    }
}
