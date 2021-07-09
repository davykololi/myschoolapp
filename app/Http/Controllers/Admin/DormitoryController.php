<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\Dormitory;
use App\Models\Meeting;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DormitoryController extends Controller
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
        $dormitories = Dormitory::get();

        return view('admin.dormitories.index',compact('dormitories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.dormitories.create');
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
        $input['school_id'] = auth()->user()->school->id;
        $dormitory = Dormitory::create($input);

        return redirect()->route('admin.dormitories.index')->withSuccess(ucwords($dormitory->name." ".'info created successfully'));
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
        $dormitory = Dormitory::findOrFail($id);
        $meetings = Meeting::all();
        $dormitoryMeetings = $dormitory->meetings;

        return view('admin.dormitories.show',compact('dormitory','meetings','dormitoryMeetings'));
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
        $dormitory = Dormitory::findOrFail($id);

        return view('admin.dormitories.edit',compact('dormitory'));
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
        $dormitory = Dormitory::findOrFail($id);
        $input = $request->only(['name','bed_no','dom_head']);
        $input['school_id'] = auth()->user()->school->id;
        $dormitory->update($input);

        return redirect()->route('admin.dormitories.index')->withSuccess(ucwords($dormitory->name." ".'info updated successfully'));
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
        $dormitory = Dormitory::findOrFail($id)->delete();

        return redirect()->route('admin.dormitories.index')->withSuccess(ucwords($dormitory->name." ".'info deleted successfully'));
    }
}
