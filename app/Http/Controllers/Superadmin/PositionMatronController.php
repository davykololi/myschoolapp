<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\MatronRoleService as MatRolService;
use Illuminate\Http\Request;
use App\Http\Requests\MatRoleFormRequest as StoreRequest;
use App\Http\Requests\MatRoleFormRequest as UpdateRequest;

class PositionMatronController extends Controller
{
    protected $matRolService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MatRolService $matRolService)
    {
        $this->middleware('auth:superadmin');
        $this->matRolService = $matRolService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $positionMatrons = $this->matRolService->all();

        return view('superadmin.position-matrons.index',compact('positionMatrons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.position-matrons.create');
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
        $positionMatron = $this->matRolService->create($request);

        return redirect()->route('superadmin.position-matrons.index')->withSuccess(ucwords($positionMatron->name." ".'role created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionMatron  $positionMatron
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $positionMatron = $this->matRolService->getId($id);

        return view('superadmin.position-matrons.show',compact('positionMatron'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionMatron  $positionMatron
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $positionMatron = $this->matRolService->getId($id);

        return view('superadmin.position-matrons.edit',compact('positionMatron'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionMatron  $positionMatron
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $positionMatron = $this->matRolService->getId($id);
        if($positionMatron){
            $this->matRolService->update($request,$id);

            return redirect()->route('superadmin.position-matrons.index')->withSuccess(ucwords($positionMatron->name." ".'role updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionMatron  $positionMatron
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $positionMatron = $this->matRolService->getId($id);
        if($positionMatron){
            $this->matRolService->delete($id);

            return redirect()->route('superadmin.position-matrons.index')->withSuccess(ucwords($positionMatron->name." ".'role deleted successfully!'));
        }
    }
}
