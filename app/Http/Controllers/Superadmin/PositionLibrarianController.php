<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\LibrarianRoleService as LibrRolService;
use Illuminate\Http\Request;
use App\Http\Requests\LibrarianRoleFormRequest as StoreRequest;
use App\Http\Requests\LibrarianRoleFormRequest as UpdateRequest;

class PositionLibrarianController extends Controller
{
    protected $librRolService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LibrRolService $librRolService)
    {
        $this->middleware('auth:superadmin');
        $this->librRolService = $librRolService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $positionLibrarians = $this->librRolService->all();

        return view('superadmin.position-librarians.index',compact('positionLibrarians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.position-librarians.create');
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
        $positionLibrarian = $this->librRolService->create($request);

        return redirect()->route('superadmin.position-librarians.index')->withSuccess(ucwords($positionLibrarian->name." ".'role created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionLibrarian  $positionLibrarian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $positionLibrarian = $this->librRolService->getId($id);

        return view('superadmin.position-librarians.show',compact('positionLibrarian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionLibrarian  $positionLibrarian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $positionLibrarian = $this->librRolService->getId($id);

        return view('superadmin.position-librarians.edit',compact('positionLibrarian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionLibrarian  $positionLibrarian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $positionLibrarian = $this->librRolService->getId($id);
        if($positionLibrarian){
            $this->librRolService->update($request,$id);

            return redirect()->route('superadmin.position-librarians.index')->withSuccess(ucwords($positionLibrarian->name." ".'role updated successfully!'));
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionLibrarian  $positionLibrarian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $positionLibrarian = $this->librRolService->getId($id);
        if($positionLibrarian){
            $this->librRolService->delete($id);

            return redirect()->route('superadmin.position-librarians.index')->withSuccess(ucwords($positionLibrarian->name." ".'role deleted successfully!'));
        }
    }
}
