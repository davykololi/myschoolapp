<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\Admin;
use App\Models\School;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class AdminController extends Controller
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
        $admins = Admin::with('superadmin')->get();
        return view('superadmin.admins.index',['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();

        return view('superadmin.admins.create',compact('schools'));
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
        $input['password'] = Hash::make($request->password);
        $input['superadmin_id'] = Auth::user()->id;
        $input['school_id'] = $request->school;
        $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $admin = Admin::create($input);
        return redirect()->route('superadmin.admins.index')->with('success','The admin created successfully');
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
        $admin = Admin::findOrFail($id);

        return view('superadmin.admins.show',['admin' => $admin]);
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
        $admin = Admin::findOrFail($id);
        $schools = School::all();

        return view('superadmin.admins.edit',compact('admin','schools'));
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
        $admin = Admin::findOrFail($id);
        if($admin){
            Storage::delete('public/storage/'.$admin->image);
            $input = $request->only('first_name','middle_name','last_name','title','email','image','id_no','emp_no','dob','designation','postal_address','phone_no',);
            $this->authorize('update',$admin);
            $input['superadmin_id'] = Auth::user()->id;
            $input['school_id'] = $request->school;
            $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
            $admin->update($input);

            return redirect()->route('superadmin.admins.index')->with('success','The admin updated successfully');
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
        $admin = Admin::findOrFail($id);
        if($admin){
            $this->authorize('delete',$admin);
            Storage::delete('public/storage/'.$Admin->image);
            $admin->delete();

        return redirect()->route('superadmin.admins.index')->with('success','The admin deleted successfully');
        }    
    }
}
