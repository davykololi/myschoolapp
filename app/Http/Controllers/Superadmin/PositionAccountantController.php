<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Services\AccountantRoleService as AccRolService;
use Illuminate\Http\Request;
use App\Http\Requests\AccRoleFormRequest as StoreRequest;
use App\Http\Requests\AccRoleFormRequest as UpdateRequest;

class PositionAccountantController extends Controller
{
    protected $accRolService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AccRolService $accRolService)
    {
        $this->middleware('auth:superadmin');
        $this->accRolService = $accRolService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $positionAccountants = $this->accRolService->all();

        return view('superadmin.position-accountants.index',compact('positionAccountants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.position-accountants.create');
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
        $positionAccountant = $this->accRolService->create($request);

        return redirect()->route('superadmin.position-accountants.index')->withSuccess(ucwords($positionAccountant->name." ".'role created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionAccountant  $positionAccountant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $positionAccountant = $this->accRolService->getId($id);

        return view('superadmin.position-accountants.show',compact('positionAccountant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionAccountant  $positionAccountant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $positionAccountant = $this->accRolService->getId($id);

        return view('superadmin.position-accountants.edit',compact('positionAccountant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionAccountant  $positionAccountant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $positionAccountant = $this->accRolService->getId($id);
        if($positionAccountant){
            $this->accRolService->update($request,$id);

            return redirect()->route('superadmin.position-accountants.index')->withSuccess(ucwords($positionAccountant->name." ".'role updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionAccountant  $positionAccountant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $positionAccountant = $this->accRolService->getId($id);
        if($positionAccountant){
            $this->accRolService->delete($id);

            return redirect()->route('superadmin.position-accountants.index')->withSuccess(ucwords($positionAccountant->name." ".'role deleted successfully!'));
        }
    }
}
