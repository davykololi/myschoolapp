<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Farm;
use App\Models\School;
use App\Models\CategoryFarm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $farms = Farm::with('school','category_farm')->get();

        return view('admin.farms.index',compact('farms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoryFarms = CategoryFarm::all();

        return view('admin.farms.create',compact('categoryFarms'));
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
        $input['code'] = strtoupper(Str::random(15));
        $input['school_id'] = Auth::user()->school->id;
        $input['category_farm_id'] = $request->farm_category;
        $farm = Farm::create($input);

        return redirect()->route('admin.farms.index')->withSuccess(ucwords($farm->name." ".'created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm)
    {
        //
        return view('admin.farms.show',compact('farm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm)
    {
        //
        $categoryFarms = CategoryFarm::all();

        return view('admin.farms.edit',compact('farm','categoryFarms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farm $farm)
    {
        //
        $input = $request->only(['name']);
        $input['school_id'] = Auth::user()->school->id;
        $input['category_farm_id'] = $request->farm_category;
        $farm->update($input);

        return redirect()->route('admin.farms.index')->withSuccess(ucwords($farm->name." ".'updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
        //
        $farm->delete();

        return redirect()->route('admin.farms.index')->withSuccess(ucwords($farm->name." ".'deleted successfully'));
    }
}
