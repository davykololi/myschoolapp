<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\SchCatService;
use Illuminate\Http\Request;
use App\Http\Requests\SchCatFormRequest as StoreRequest;
use App\Http\Requests\SchCatFormRequest as UpdateRequest;

class CategorySchoolController extends Controller
{
    protected $schCatService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SchCatService $schCatService)
    {
        $this->middleware('auth:superadmin');
        $this->schCatService = $schCatService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorySchools = $this->schCatService->all();

        return view('superadmin.category-schools.index',compact('categorySchools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.category-schools.create');
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
        $categorySchool = $this->schCatService->create($request);

        return redirect()->route('superadmin.category-schools.index')->withSuccess(ucwords($categorySchool->name." ".'info created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorySchool  $categorySchool
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $categorySchool = $this->schCatService->getId($id);

        return view('superadmin.category-schools.show',compact('categorySchool'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategorySchool  $categorySchool
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categorySchool = $this->schCatService->getId($id);

        return view('superadmin.category-schools.edit',compact('categorySchool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorySchool  $categorySchool
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $categorySchool = $this->schCatService->getId($id);
        if($categorySchool){
            $this->schCatService->update($request,$id);

        return redirect()->route('superadmin.category-schools.index')->withSuccess(ucwords($categorySchool->name." ".'info updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorySchool  $categorySchool
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categorySchool = $this->schCatService->getId($id);
        if($categorySchool){
            $this->SchCatService->delete($id);

            return redirect()->route('superadmin.category-schools.index')->withSuccess(ucwords($categorySchool->name." ".'info deleted successfully!'));
        }
    }
}
