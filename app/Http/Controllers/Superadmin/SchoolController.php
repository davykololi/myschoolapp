<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\CategorySchool;
use App\Models\School;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    use ImageUploadTrait;
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
        $schools = School::with('teachers','students','category_school')->get();

        return view('superadmin.schools.index',['schools'=>$schools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $schoolCategories = CategorySchool::all();

        return view('superadmin.schools.create',compact('schoolCategories'));
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
        $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $input['code'] = strtoupper(Str::random(15));
        $input['category_school_id'] = $request->school_category;
        $school = School::create($input);

        return redirect()->route('superadmin.schools.index')->withSuccess(ucwords($school->name." ".'created successfully'));
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
        $school = School::findOrFail($id);

        return view('superadmin.schools.show',['school'=>$school]);
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
        $school = School::findOrFail($id);
        $schoolCategories = CategorySchool::all();

        return view('superadmin.schools.edit',compact('school','schoolCategories'));
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
        $school = School::findOrFail($id);
        if($school){
            Storage::delete('public/storage/'.$school->image);
            $input = $request->only('name','head','ass_head','motto','vision','email','postal_address','mission','core_values');
            $input['category_school_id'] = $request->school_category;
            $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
            $school->update($input);

            return redirect()->route('superadmin.schools.index')->withSuccess(ucwords($school->name." ".'details updated successfully'));
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
        $school = School::findOrFail($id);
        if($school){
            Storage::delete('public/storage/'.$school->image);
            $school->delete();

            return redirect()->route('superadmin.schools.index')->withSuccess(ucwords($school->name." ".'deleted successfully'));
        }
    }
}
