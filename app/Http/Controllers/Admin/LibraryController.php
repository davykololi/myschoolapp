<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\School;
use App\Models\Library;
use App\Models\Meeting;
use App\Models\Librarian;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibraryController extends Controller
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
        $libraries = Library::with('students','school',)->latest()->get();

        return view('admin.libraries.index',['libraries'=>$libraries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.libraries.create');
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
        $library = Library::create($input);

        return redirect()->route('admin.libraries.index')->withSuccess(ucwords($library->name." ".'info created successfully'));
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
        $library = Library::findOrFail($id);
        $meetings = Meeting::all();
        $libraryMeetings = $library->meetings;

        return view('admin.libraries.show',compact('library','meetings','libraryMeetings'));
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
        $library = Library::findOrFail($id);

        return view('admin.libraries.edit',compact('library'));
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
        $library = Library::findOrFail($id);
        $input = $request->only('name','phone_no');
        $input['school_id'] = Auth::user()->school->id;
        $library->update($input);

        return redirect()->route('admin.libraries.index')->withSuccess(ucwords($library->name." ".'info updated successfully'));
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
        $library = Library::findOrFail($id);
        $library->delete();

        return redirect()->route('admin.libraries.index')->withSuccess(ucwords('info eleted successfully'));
    }
}
