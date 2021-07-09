<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\PositionMatron;
use Illuminate\Http\Request;

class PositionMatronController extends Controller
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
        $positionMatrons = PositionMatron::get();

        return view('superadmin.position-matrons.index',compact('positionMatrons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.position-matrons.create');
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
        PositionMatron::create($input);

        return redirect()->route('superadmin.position-matrons.index')->withSuccess('The matron role created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionMatron  $positionMatron
     * @return \Illuminate\Http\Response
     */
    public function show(PositionMatron $positionMatron)
    {
        //
        return view('superadmin.position-matrons.show',compact('positionMatron'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionMatron  $positionMatron
     * @return \Illuminate\Http\Response
     */
    public function edit(PositionMatron $positionMatron)
    {
        //
        return view('superadmin.position-matrons.edit',compact('positionMatron'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionMatron  $positionMatron
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PositionMatron $positionMatron)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $positionMatron->update($input);

        return redirect()->route('superadmin.position-matrons.index')->withSuccess('The matron role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionMatron  $positionMatron
     * @return \Illuminate\Http\Response
     */
    public function destroy(PositionMatron $positionMatron)
    {
        //
        $positionMatron->delete();

        return redirect()->route('superadmin.position-matrons.index')->withSuccess('The matron role deleted successfully!');
    }
}
