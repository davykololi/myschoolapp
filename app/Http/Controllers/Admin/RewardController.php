<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\Stream;
use App\Models\Department;
use App\Models\Reward;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RewardController extends Controller
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
        $rewards = Reward::with('school')->latest()->get();

        return view('admin.rewards.index',compact('rewards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teachers = Teacher::all();
        $students = Student::all();
        $staffs = Staff::all();
        $streams = Stream::all();

        return view('admin.rewards.create',compact('teachers','students','staffs','streams'));
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
        $reward = Reward::create($input);
        $teacherId = $request->teacher;
        $reward->teachers()->attach($teacherId);
        $studentId = $request->student;
        $reward->students()->attach($studentId);
        $staffId = $request->staff;
        $reward->staffs()->attach($staffId);
        $streamId = $request->stream;
        $reward->streams()->attach($streamId);

        return redirect()->route('admin.rewards.index')->withSuccess('The reward created successfully');
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
        $reward = Reward::findOrFail($id);

        return view('admin.rewards.show',['reward'=>$reward]);
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
        $reward = Reward::findOrFail($id);
        $teachers = Teacher::all();
        $students = Student::all();
        $staffs = Staff::all();
        $streams = Stream::all();

        return view('admin.rewards.edit',compact('reward','teachers','students','staffs','streams'));
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
        $reward = Reward::findOrFail($id);
        $input = $request->all();
        $input['school_id'] = auth()->user()->school->id;
        $reward->update($input);
        $teacherId = $request->teacher;
        $reward->teachers()->sync($teacherId);
        $studentId = $request->student;
        $reward->students()->sync($studentId);
        $staffId = $request->staff;
        $reward->staffs()->sync($staffId);
        $streamId = $request->stream;
        $reward->streams()->sync($streamId);

        return redirect()->route('admin.rewards.index')->withSuccess('The reward updated successfully');

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
        $reward = Reward::findOrFail($id)->delete();

        return redirect()->route('admin.rewards.index')->withSuccess('The reward deleted successfully');
    }
}
