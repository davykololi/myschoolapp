<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\School;
use App\Models\Staff;
use App\Models\Admin;
use App\Models\PositionStaff;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;

class StaffController extends Controller
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
        $staffs = Staff::get();

        return view('admin.staffs.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $staffRoles = PositionStaff::all();

        return view('admin.staffs.create',compact('staffRoles'));
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
        $input['position_staff_id'] = $request->staff_role;
        $input['admin_id'] = Auth::id();
        $input['password'] = Hash::make($request->password);
        $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        Staff::create($input);

        return redirect()->route('admin.staffs.index')->withSuccess('The subordnade created successfully');
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
        $staff = Staff::findOrFail($id);

        return view('admin.staffs.show',['staff'=>$staff]);
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
        $staff = Staff::findOrFail($id);
        $staffRoles = PositionStaff::all();

        return view('admin.staffs.edit',compact('staff','staffRoles'));
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
        $staff = Staff::findOrFail($id);
        if($staff){
            Storage::delete('public/storage/'.$staff->image);
            $input = $request->only('first_name','middle_name','last_name','title','email','emp_no','id_no','dob','designation','postal_address','phone_no','history');
            $input['school_id'] = auth()->user()->school_id;
            $input['position_staff_id'] = $request->staff_role;
            $input['admin_id'] = Auth::id();
            $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
            $staff->update($input);

            return redirect()->route('admin.staffs.index')->withSuccess('The subordnade staff updated successfully');
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
        $staff = Staff::findOrFail($id);
        if($staff){
            Storage::delete('public/storage/'.$staff->image);
            $staff->delete();

            return redirect()->route('admin.staffs.index')->withSuccess('The subordnade staff deleted successfully');
        }
    }
}
