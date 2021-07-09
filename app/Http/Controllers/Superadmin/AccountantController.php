<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Accountant;
use App\Models\PositionAccountant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;

class AccountantController extends Controller
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
        $accountants = Accountant::with('school')->get();

        return view('superadmin.accountants.index',compact('accountants'));
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
        $accountantRoles = PositionAccountant::all();

        return view('superadmin.accountants.create',compact('schools','accountantRoles'));
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
        $input['position_accountant_id'] = $request->accountant_role;
        $input['password'] = Hash::make($request->password);
        $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        Accountant::create($input);

        return redirect()->route('superadmin.accountants.index')->withSuccess('The accountant info created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function show(Accountant $accountant)
    {
        //
        return view('superadmin.accountants.show',compact('accountant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function edit(Accountant $accountant)
    {
        //
        $schools = School::all();
        $accountantRoles = PositionAccountant::all();

        return view('superadmin.accountants.edit',compact('accountant','schools','accountantRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accountant $accountant)
    {
        //
        if($accountant){
            Storage::delete('public/storage/'.$accountant->image);
            $input=$request->only('title','first_name','middle_name','last_name','dob','email','current_address','permanent_address','phone_no','id_no','designation','emp_no','history');
            $input['school_id'] = $request->school;
            $input['position_accountant_id'] = $request->accountant_role;
            $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
            $accountant->update($input);

            return redirect()->route('superadmin.accountants.index')->withSuccess('The accountant info updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accountant $accountant)
    {
        //
        if($accountant){
            Storage::delete('public/storage/'.$accountant->image);
            $accountant->delete();

            return redirect()->route('superadmin.accountants.index')->withSuccess('The accountant info deleted successfully');
        }
    }
}
