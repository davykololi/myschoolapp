<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\Letter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('banned');
        $this->middleware('admin2fa');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $letters = Letter::with('school')->latest('id')->get();

        return view('admin.letters.index',compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.letters.create');
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
        $input['school_id'] = auth()->user()->school->id;
        $letter = Letter::create($input);

        return redirect()->route('admin.letters.index')->withSuccess(ucwords('The letter created successfully'));
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
        $letter = Letter::findOrFail($id);

        return view('admin.letters.show',compact('letter'));
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
        $letter = Letter::findOrFail($id);

        return view('admin.letters.edit',compact('letter'));
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
        $letter = Letter::findOrFail($id);
        $input = $request->all();
        $input['school_id'] = auth()->user()->school->id;
        $letter->update($input);

        return redirect()->route('admin.letters.index')->withSuccess(ucwords('The letter updated successfully'));
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
        $letter = Letter::findOrFail($id);
        $letter->delete();

        return redirect()->route('admin.letters.index')->withSuccess(ucwords('The letter deleted successfully'));
    }
}
