<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\MyParent;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;

class MyParentController extends Controller
{
    use ImageUploadTrait;

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
        $parents = MyParent::with('school','students')->get();

        return view('admin.parents.index',compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.parents.create');
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
        $input['password'] = Hash::make($request->password);
        $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $parent = MyParent::create($input);

        return redirect()->route('admin.parents.index')->withSuccess(ucwords($parent->full_name." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyParent  $myParent
     * @return \Illuminate\Http\Response
     */
    public function show(MyParent $parent)
    {
        //
        return view('admin.parents.show',compact('parent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyParent  $myParent
     * @return \Illuminate\Http\Response
     */
    public function edit(MyParent $parent)
    {
        //

        return view('admin.parents.edit',compact('parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyParent  $myParent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyParent $parent)
    {
        //
        if($parent){
            Storage::delete('public/storage/'.$parent->image);
            $input=$request->only('title','first_name','middle_name','last_name','dob','email','current_address','permanent_address','phone_no','id_no','designation','emp_no');
            $input['school_id'] = auth()->user()->school->id;
            $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
            $parent->update($input);

            return redirect()->route('admin.parents.index')->withSuccess(ucwords($parent->full_name." ".'info updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyParent  $myParent
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyParent $parent)
    {
        //
        if($parent){
            Storage::delete('public/storage/'.$parent->image);
            $parent->delete();

            return redirect()->route('admin.parents.index')->withSuccess(ucwords($parent->full_name." ".'info deleted successfully'));
        }
    }
}
