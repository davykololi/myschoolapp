<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\SchoolService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SchoolFormRequest as StoreRequest;
use App\Http\Requests\SchoolFormRequest as UpdateRequest;

class SchoolController extends Controller
{
    protected $schoolService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SchoolService $schoolService)
    {
        $this->middleware('auth:superadmin');
        $this->middleware('banned');
        $this->middleware('superadmin2fa');
        $this->schoolService = $schoolService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schools = $this->schoolService->all();

        return view('superadmin.schools.index',['schools'=>$schools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.schools.create');
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
        $school = $this->schoolService->create($request);

        return redirect()->route('superadmin.schools.index')->withSuccess(ucwords($school->name." ".'created successfully'));
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
        $school = $this->schoolService->getId($id);

        return view('superadmin.schools.show',['school'=>$school]);
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
        $school = $this->schoolService->getId($id);

        return view('superadmin.schools.edit',compact('school'));
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
        $school = $this->schoolService->getId($id);
        if($school){
            Storage::delete('public/storage/'.$school->image);
            $this->schoolService->update($request,$id);

            return redirect()->route('superadmin.schools.index')->withSuccess(ucwords($school->name." ".'details updated successfully'));
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
        $school = $this->schoolService->getId($id);
        if($school){
            Storage::delete('public/storage/'.$school->image);
            $this->schoolService->delete($id);

            return redirect()->route('superadmin.schools.index')->withSuccess(ucwords($school->name." ".'deleted successfully'));
        }
    }
}
