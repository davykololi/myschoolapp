<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Services\ClassService;
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Requests\ClassFormRequest as StoreRequest;
use App\Http\Requests\ClassFormRequest as UpdateRequest;

class MyClassController extends Controller
{
    protected $classService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClassService $classService)
    {
        $this->middleware('auth:superadmin');
        $this->middleware('banned');
        $this->middleware('superadmin2fa');
        $this->classService = $classService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = $this->classService->all();

        return view('superadmin.classes.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $class = $this->classService->create($request);

        return redirect()->route('superadmin.classes.index')->withSuccess(ucwords($class->name." ".'class info created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $class = $this->classService->getId($id);
        $classStudents = $class->students->count();
        $females = $class->females();
        $males = $class->males();

        return view('superadmin.classes.show',compact('class','classStudents','females','males'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $class = $this->classService->getId($id);

        return view('superadmin.classes.edit',compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$id)
    {
        $class = $this->classService->getId($id);
        if($class){
            $this->classService->update($request,$id);

            return redirect()->route('superadmin.classes.index')->withSuccess(ucwords($class->name." ".'class info updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = $this->classService->getId($id);
        if($class){
            $this->classService->delete($id);

            return redirect()->route('superadmin.classes.index')->withSuccess(ucwords($class->name." ".'class info deleted successfully!'));
        }
    }
}
