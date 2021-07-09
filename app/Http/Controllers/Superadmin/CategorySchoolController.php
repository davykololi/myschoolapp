<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CategorySchool;
use Illuminate\Http\Request;

class CategorySchoolController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorySchools = CategorySchool::get();

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
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        CategorySchool::create($input);

        return redirect()->route('superadmin.category-schools.index')->withSuccess('The school category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorySchool  $categorySchool
     * @return \Illuminate\Http\Response
     */
    public function show(CategorySchool $categorySchool)
    {
        //
        return view('superadmin.category-schools.show',compact('categorySchool'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategorySchool  $categorySchool
     * @return \Illuminate\Http\Response
     */
    public function edit(CategorySchool $categorySchool)
    {
        //
        return view('superadmin.category-schools.edit',compact('categorySchool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorySchool  $categorySchool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategorySchool $categorySchool)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $categorySchool->update($input);

        return redirect()->route('superadmin.category-schools.index')->withSuccess('The school category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorySchool  $categorySchool
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorySchool $categorySchool)
    {
        //
        if($categorySchool){
            $categorySchool->schools()->delete();
        }
        $categorySchool->delete();

        return redirect()->route('superadmin.category-schools.index')->withSuccess('The school category deleted successfully!');
    }
}
