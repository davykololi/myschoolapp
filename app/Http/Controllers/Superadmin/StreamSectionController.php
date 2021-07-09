<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\StreamSection;
use App\Models\School;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StreamSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $streamSections = StreamSection::with('streams','school')->get();

        return view('superadmin.stream-sections.index',compact('streamSections'));
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

        return view('superadmin.stream-sections.create',compact('schools'));
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
        $streamSection = StreamSection::create($input);

        return redirect()->route('superadmin.stream-sections.index')->withSuccess(ucwords($streamSection->name." ".'info created successfully'));
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
        $streamSection = StreamSection::findOrFail($id);

        return view('superadmin.stream-sections.show',compact('streamSection'));
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
        $streamSection = StreamSection::findOrFail($id);
        $schools = School::all();

        return view('superadmin.stream-sections.show',compact('streamSection','schools'));
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
        $streamSection = StreamSection::findOrFail($id);
        $input['school_id'] = $request->school;
        $streamSection->update($input);

        return redirect()->route('superadmin.stream-sections.index')->withSuccess(ucwords($streamSection->name." ".'info updated successfully'));
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
        $streamSection = StreamSection::findOrFail($id);
        if($streamSection->hasStreams){
            return back()->withErrors(($stream->name." ".'has class streams and cant be deleted'));
        }
        $streamSection->delete();

        return redirect()->route('superadmin.stream-sections.index')->withSuccess(ucwords($streamSection->name." ".'info deleted successfully'));
    }
}
