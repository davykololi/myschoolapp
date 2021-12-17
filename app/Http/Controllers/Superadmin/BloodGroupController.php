<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\BloodGroup;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BloodGroupController extends Controller
{
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
        $bloodGroups = BloodGroup::with('teachers','students','staffs','accountants','librarians','matrons','parents')->get();

        return view('superadmin.blood-groups.index',compact('bloodGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.blood-groups.create');
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
        $input['slug'] = Str::slug($request->type,'-');
        $bloodGroup = BloodGroup::create($input);

        return redirect()->route('superadmin.blood-groups.index')->withSuccess(ucwords('Blood group'." ".$bloodGroup->type." ".'info created successfully'));
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
        $bloodGroup = BloodGroup::findOrFail($id);

        return view('superadmin.blood-groups.show',compact('bloodGroup'));
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
        $bloodGroup = BloodGroup::findOrFail($id);

        return view('superadmin.blood-groups.edit',compact('bloodGroup'));
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
        $bloodGroup = BloodGroup::findOrFail($id);
        if($bloodGroup){
            $input = $request->all();
            $input['slug'] = Str::slug($request->type,'-');
            $bloodGroup->update($input);

            return redirect()->route('superadmin.blood-groups.index')->withSuccess(ucwords('Blood group'." ".$bloodGroup->type." ".'info updated successfully'));
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
        $bloodGroup = BloodGroup::findOrFail($id);
        if($bloodGroup){
            $bloodGroup->delete();

            return redirect()->route('superadmin.blood-groups.index')->withSuccess(ucwords('Blood group'." ".$bloodGroup->type." ".'info deleted successfully'));
        }
    }
}
