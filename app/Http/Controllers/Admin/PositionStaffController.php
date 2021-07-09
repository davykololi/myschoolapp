<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\PositionStaff;
use Illuminate\Http\Request;

class PositionStaffController extends Controller
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
        $positionStaffs = PositionStaff::get();

        return view('admin.position-staffs.index',compact('positionStaffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.position-staffs.create');
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
        PositionStaff::create($input);

        return redirect()->route('admin.position-staffs.index')->withSuccess('The subordinade staff role created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionStaff  $positionStaff
     * @return \Illuminate\Http\Response
     */
    public function show(PositionStaff $positionStaff)
    {
        //
        return view('admin.position-staffs.show',compact('positionStaff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionStaff  $positionStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(PositionStaff $positionStaff)
    {
        //
        return view('admin.position-staffs.edit',compact('positionStaff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionStaff  $positionStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PositionStaff $positionStaff)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $positionStaff->update($input);

        return redirect()->route('admin.position-staffs.index')->withSuccess('The subordinade staff role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionStaff  $positionStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(PositionStaff $positionStaff)
    {
        //
        $positionStaff->delete();

        return redirect()->route('admin.position-staffs.index')->withSuccess('The subordinade staff role deleted successfully!');
    }
}
