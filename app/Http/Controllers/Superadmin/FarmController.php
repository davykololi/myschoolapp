<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\FarmService;
use Illuminate\Http\Request;
use App\Http\Requests\FarmFormRequest as StoreRequest;
use App\Http\Requests\FarmFormRequest as UpdateRequest;

class FarmController extends Controller
{
    protected $farmService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FarmService $farmService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->farmService = $farmService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $farms = $this->farmService->all();

        return view('superadmin.farms.index',compact('farms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.farms.create');
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
        $farm = $this->farmService->create($request);

        return redirect()->route('superadmin.farms.index')->withSuccess(ucwords($farm->name." ".'created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $farm = $this->farmService->getId($id);

        return view('superadmin.farms.show',compact('farm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $farm = $this->farmService->getId($id);

        return view('superadmin.farms.edit',compact('farm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $farm = $this->farmService->getId($id);
        if($farm){
            $this->farmService->update($request,$id);

            return redirect()->route('superadmin.farms.index')->withSuccess(ucwords($farm->name." ".'updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $farm = $this->farmService->getId($id);
        if($farm){
            $this->farmService->delete($id);

            return redirect()->route('superadmin.farms.index')->withSuccess(ucwords($farm->name." ".'deleted successfully'));
        }
    }
}
