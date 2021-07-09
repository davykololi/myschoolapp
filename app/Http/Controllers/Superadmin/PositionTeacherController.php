<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\PositionTeacher;
use Illuminate\Http\Request;

class PositionTeacherController extends Controller
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
        $positionTeachers = PositionTeacher::get();

        return view('superadmin.position-teachers.index',compact('positionTeachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.position-teachers.create');
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
        PositionTeacher::create($input);

        return redirect()->route('superadmin.position-teachers.index')->withSuccess('The teacher role created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionTeacher  $positionTeacher
     * @return \Illuminate\Http\Response
     */
    public function show(PositionTeacher $positionTeacher)
    {
        //
        return view('superadmin.position-teachers.show',compact('positionTeacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionTeacher  $positionTeacher
     * @return \Illuminate\Http\Response
     */
    public function edit(PositionTeacher $positionTeacher)
    {
        //
        return view('superadmin.position-teachers.edit',compact('positionTeacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionTeacher  $positionTeacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PositionTeacher $positionTeacher)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $positionTeacher->update($input);

        return redirect()->route('superadmin.position-teachers.index')->withSuccess('The teacher role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionTeacher  $positionTeacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(PositionTeacher $positionTeacher)
    {
        //
        $positionTeacher->delete();

        return redirect()->route('superadmin.position-teachers.index')->withSuccess('The teacher role deleted successfully!');
    }
}
