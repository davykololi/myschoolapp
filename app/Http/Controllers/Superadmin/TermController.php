<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Support\Str;
use App\Models\Term;
use App\Models\School;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermController extends Controller
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
        $terms = Term::with('school')->get();

        return view('superadmin.terms.index',compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $schools = School::all();

        return view('superadmin.terms.create',compact('schools'));
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
        $input['school_id'] = $request->school;
        $schoolId = $request->school;
        $school = School::whereId($schoolId)->first();
        $input['code'] = strtoupper($school->initials."/".Str::random(5)."/".now()->year);
        $term = Term::create($input);

        return redirect()->route('superadmin.terms.index')->withSuccess(ucwords($term->name." ".'info created successfully!!'));
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
        $term = Term::findOrFail($id);

        return view('superadmin.terms.show',compact('term'));
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
        $term = Term::findOrFail($id);
        $schools = School::all();

        return view('superadmin.terms.edit',compact('term','schools'));
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
        $term = Term::findOrFail($id);
        $input = $request->only('name');
        $input['school_id'] = $request->school;
        $schoolId = $request->school;
        $school = School::whereId($schoolId)->first();
        $input['code'] = strtoupper($school->initials."/".Str::random(5)."/".now()->year);
        $term->update($input);

        return redirect()->route('superadmin.terms.index')->withSuccess(ucwords($term->name." ".'info updated successfully!!'));
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
        $term = Term::findOrFail($id);
        if($term){
        	$term->delete();

        	return redirect()->route('superadmin.terms.index')->withSuccess(ucwords($term->name." ".'info deleted successfully!!'));
        }
        	return redirect()->route('superadmin.terms.index')->withErrors('Sorry!!, Something wrong happened!, Try again');
    }
}
