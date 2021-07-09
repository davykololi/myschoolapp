<?php

namespace App\Http\Controllers\Admin;

use App\Models\Timetable;
use App\Models\School;
use App\Models\Stream;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FilesUploadTrait;
use Illuminate\Support\Facades\Storage;

class TimetableController extends Controller
{
    use FilesUploadTrait;
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
        $timetables = Timetable::with('school','stream')->get();

        return view('admin.timetables.index',['timetables'=>$timetables]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $streams = Stream::all();

        return view('admin.timetables.create',compact('streams'));
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
        $input['file'] = $this->verifyAndUpload($request,'file','public/files/');
        $input['school_id'] = auth()->user()->school->id;
        $input['stream_id'] = $request->stream;
        $timetable = Timetable::create($input);

        return redirect()->route('admin.timetables.index')->withSuccess('The timetable created successfully');
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
        $timetable = Timetable::findOrFail($id);

        return view('admin.timetables.show',['timetable'=>$timetable]);
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
        $timetable = Timetable::findOrFail($id);
        $streams = Stream::all();
    
        return view('admin.timetables.edit',['timetable'=>$timetable,'streams'=>$streams]);
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
        $timetable = Timetable::findOrFail($id);

        if($timetable){
            Storage::delete('public/files/'.$timetable->file);
            $input = $request->all();
            $input['file'] = $this->verifyAndUpload($request,'file','public/files/');
            $input['school_id'] = $request->school;
            $input['stream_id'] = $request->stream;
            $timetable->update($input);

            return redirect()->route('admin.timetables.index')->withSuccess('The timetable updated successfully');
        }
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
        $timetable = Timetable::findOrFail($id);
        if($timetable){
            Storage::delete('public/files/'.$timetable->file);
            $timetable->delete();

            return redirect()->route('admin.timetables.index')->withSuccess('The timetable deleted successfully');
        }
    }
}
