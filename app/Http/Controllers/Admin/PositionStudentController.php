<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\PositionStudent;
use Illuminate\Http\Request;

class PositionStudentController extends Controller
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
        $positionStudents = PositionStudent::get();

        return view('admin.position-students.index',compact('positionStudents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.position-students.create');
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
        PositionStudent::create($input);

        return redirect()->route('admin.position-students.index')->withSuccess('The student role created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionStudent  $positionStudent
     * @return \Illuminate\Http\Response
     */
    public function show(PositionStudent $positionStudent)
    {
        //
        return view('admin.position-students.show',compact('positionStudent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionStudent  $positionStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(PositionStudent $positionStudent)
    {
        //
        return view('admin.position-students.edit',compact('positionStudent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionStudent  $positionStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PositionStudent $positionStudent)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $positionStudent->update($input);

        return redirect()->route('admin.position-students.index')->withSuccess('The student role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionStudent  $positionStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(PositionStudent $positionStudent)
    {
        //
        $positionStudent->delete();

        return redirect()->route('admin.position-students.index')->withSuccess('The student role deleted successfully!');
    }
}
