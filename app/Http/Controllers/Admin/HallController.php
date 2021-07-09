<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\School;
use App\Models\Hall;
use App\Models\CategoryHall;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HallController extends Controller
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
        $halls = Hall::with('school',)->get();

        return view('admin.halls.index',['halls'=>$halls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoryHalls = CategoryHall::all();

        return view('admin.halls.create',compact('categoryHalls'));
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
        $input['category_hall_id'] = $request->hall_category;
        $hall = Hall::create($input);

        return redirect()->route('admin.halls.index')->withSuccess(ucwords($hall->name." ".'info created successfully'));
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
        $hall = Hall::findOrFail($id);

        return view('admin.halls.show',['hall'=>$hall]);
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
        $hall = Hall::findOrFail($id);
        $categoryHalls = CategoryHall::all();

        return view('admin.halls.edit',compact('hall','categoryHalls'));
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
        $hall = Hall::findOrFail($id);
        $input = $request->only('name');
        $input['school_id'] = Auth::user()->school->id;
        $input['category_hall_id'] = $request->hall_category;
        $hall->update($input);

        return redirect()->route('admin.halls.index')->withSuccess(ucwords($hall->name." ".'info updated successfully'));
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
        $hall = Hall::findOrFail($id);
        $hall->delete();

        return redirect()->route('admin.halls.index')->withSuccess(ucwords($hall->name." ".'info deleted successfully'));
    }
}
