<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Year;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class YearController extends Controller
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
        $years = Year::all();

        return view('superadmin.years.index',compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.years.create');
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
        $year = Year::create($input);

        return redirect()->route('superadmin.years.index')->withSuccess(ucwords($year->year." ".'info created successfully!!'));
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
        $year = Year::findOrFail($id);

        return view('superadmin.years.show',compact('year'));
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
        $year = Year::findOrFail($id);

        return view('superadmin.years.edit',compact('year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $year = Year::findOrFail($id);
        $input = $request->all();
        $year->update($input);

        return redirect()->route('superadmin.years.index')->withSuccess(ucwords($year->year." ".'info updated successfully!!'));
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
        $year = Year::findOrFail($id);
        if($year){
            $year->delete();

            return redirect()->route('superadmin.years.index')->withSuccess(ucwords($year->year." ".'info deleted successfully!!'));
        }
            return redirect()->route('superadmin.years.index')->withErrors('Sorry!!, Something wrong happened!, Try again');
    }
}
