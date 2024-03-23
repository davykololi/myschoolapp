<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DepartmentSectionService;
use App\Http\Requests\DeptSectionFormRequest as StoreRequest;
use App\Http\Requests\DeptSectionFormRequest as UpdateRequest;

class DepartmentSectionController extends Controller
{
    protected $deptSectionService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DepartmentSectionService $deptSectionService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->deptSectionService = $deptSectionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $deptSections = $this->deptSectionService->all();

        return view('superadmin.department-sections.index',compact('deptSections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('superadmin.department-sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $deptSection = $this->deptSectionService->create($request);

        return redirect()->route('superadmin.department-sections.index')->withSuccess(ucwords($deptSection->name." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $deptSection = $this->deptSectionService->getId($id);
        $deptSectionDepartments = $deptSection->departments()->with('department_section')->get();

        return view('superadmin.department-sections.show',compact('deptSection','deptSectionDepartments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $deptSection = $this->deptSectionService->getId($id);

        return view('superadmin.department-sections.edit',compact('deptSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $deptSection = $this->deptSectionService->getId($id);
        if($deptSection){
            $this->deptSectionService->update($request,$id);

            return redirect()->route('superadmin.department-sections.index')->withSuccess(ucwords($deptSection->name." ".'info updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deptSection = $this->deptSectionService->getId($id);
        if($deptSection){
            $this->deptSectionService->delete($id);

            return redirect()->route('superadmin.department-sections.index')->withSuccess(ucwords($deptSection->name." ".'deleted successfully'));
        }
    }
}
