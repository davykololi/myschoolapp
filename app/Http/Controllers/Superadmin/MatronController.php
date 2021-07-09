<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Matron;
use App\Models\PositionMatron;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;

class MatronController extends Controller
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
        $matrons = Matron::with('school','position_matron')->get();

        return view('superadmin.matrons.index',compact('matrons'));
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
        $matronRoles = PositionMatron::all();

        return view('superadmin.matrons.create',compact('schools','matronRoles'));
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
        $input['position_matron_id'] = $request->matron_role;
        $input['password'] = Hash::make($request->password);
        $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        Matron::create($input);

        return redirect()->route('superadmin.matrons.index')->withSuccess('The matron info created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matron  $matron
     * @return \Illuminate\Http\Response
     */
    public function show(Matron $matron)
    {
        //
        return view('superadmin.matrons.show',compact('matron'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matron  $matron
     * @return \Illuminate\Http\Response
     */
    public function edit(Matron $matron)
    {
        //
        $schools = School::all();
        $matronRoles = PositionMatron::all();

        return view('superadmin.matrons.edit',compact('matron','schools','matronRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matron  $matron
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matron $matron)
    {
        //
        if($matron){
            Storage::delete('public/storage/'.$matron->image);
            $input=$request->only('title','first_name','middle_name','last_name','dob','email','current_address','permanent_address','phone_no','id_no','designation','emp_no');
            $input['school_id'] = $request->school;
            $input['position_matron_id'] = $request->matron_role;
            $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
            $matron->update($input);

            return redirect()->route('superadmin.matrons.index')->withSuccess('The matron info updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matron  $matron
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matron $matron)
    {
        //
        if($matron){
            Storage::delete('public/storage/'.$matron->image);
            $matron->delete();

            return redirect()->route('superadmin.matrons.index')->withSuccess('The matron info deleted successfully');
        }
    }
}
