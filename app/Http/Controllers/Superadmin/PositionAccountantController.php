<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\PositionAccountant;
use Illuminate\Http\Request;

class PositionAccountantController extends Controller
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
        $positionAccountants = PositionAccountant::get();

        return view('superadmin.position-accountants.index',compact('positionAccountants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.position-accountants.create');
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
        PositionAccountant::create($input);

        return redirect()->route('superadmin.position-accountants.index')->withSuccess('The accountant role created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionAccountant  $positionAccountant
     * @return \Illuminate\Http\Response
     */
    public function show(PositionAccountant $positionAccountant)
    {
        //
        return view('superadmin.position-accountants.show',compact('positionAccountant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionAccountant  $positionAccountant
     * @return \Illuminate\Http\Response
     */
    public function edit(PositionAccountant $positionAccountant)
    {
        //
        return view('superadmin.position-accountants.edit',compact('positionAccountant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionAccountant  $positionAccountant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PositionAccountant $positionAccountant)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $positionAccountant->update($input);

        return redirect()->route('superadmin.position-accountants.index')->withSuccess('The accountant role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionAccountant  $positionAccountant
     * @return \Illuminate\Http\Response
     */
    public function destroy(PositionAccountant $positionAccountant)
    {
        //
        $positionAccountant->delete();

        return redirect()->route('superadmin.position-accountants.index')->withSuccess('The accountant role deleted successfully!');
    }
}
