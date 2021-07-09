<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Intake;
use App\Models\School;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntakeController extends Controller
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
        $intakes = Intake::get();

        return view('admin.intakes.index',compact('intakes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.intakes.create');
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
        $input['school_id'] = Auth::user()->school->id;
        $intake = Intake::create($input);

        return redirect()->route('admin.intakes.index')->withSuccess(ucwords($intake->name." ".'info created successfully'));
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
        $intake = Intake::findOrFail($id);

        return view('admin.intakes.show',['intake'=>$intake]);
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
        $intake = Intake::findOrFail($id);

        return view('admin.intakes.edit',compact('intake'));
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
        $intake = Intake::findOrFail($id);
        $input = $request->all();
        $input['school_id'] = Auth::user()->school->id;
        $intake->update($input);

        return redirect()->route('admin.intakes.index')->withSuccess(ucwords($intake->name." ".'info updated successfully'));
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
        $intake = Intake::findOrFail($id)->delete();

        return redirect()->route('admin.intakes.index')->withSuccess(ucwords($intake->name." ".'info deleted successfully'));
    }
}
