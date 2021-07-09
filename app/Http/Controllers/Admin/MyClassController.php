<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\MyClass;
use App\Models\School;
use Illuminate\Http\Request;

class MyClassController extends Controller
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
        $classes = MyClass::get();

        return view('admin.classes.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['school_id'] = Auth::user()->school->id;
        $input['slug'] = Str::slug($request->name,'-');
        $class = MyClass::create($input);

        return redirect()->route('admin.classes.index')->withSuccess(ucwords($class->name." ".'class info created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function show(MyClass $class)
    {
        //
        return view('admin.classes.show',compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function edit(MyClass $class)
    {
        //
        return view('admin.classes.edit',compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyClass $class)
    {
        $input = $request->all();
        $input['school_id'] = Auth::user()->school->id;
        $input['slug'] = Str::slug($request->name,'-');
        $class->update($input);

        return redirect()->route('admin.classes.index')->withSuccess(ucwords($class->name." ".'class info updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyClass $class)
    {
        $class->delete();

        return redirect()->route('admin.classes.index')->withSuccess(ucwords($class->name." ".'class info deleted successfully!'));
    }
}
