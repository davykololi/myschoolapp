<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ParentService;
use App\Models\BloodGroup;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ParentFormRequest as StoreRequest;
use App\Http\Requests\ParentFormRequest as UpdateRequest;

class MyParentController extends Controller
{
    protected $parentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ParentService $parentService)
    {
        $this->middleware('auth:admin');
        $this->parentService = $parentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $parents = $this->parentService->all();

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
        $bloodGroups = BloodGroup::all();

        return view('admin.parents.create',compact('bloodGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        $parent = $this->parentService->create($request);
        if(!$parent){
            return redirect()->route('admin.parents.index')->withErrors(ucwords('Oops!, An error occured. Please try again later'));
        }
            return redirect()->route('admin.parents.index')->withSuccess(ucwords($parent->name." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyParent  $myParent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $parent = $this->parentService->getId($id);

        return view('admin.parents.show',compact('parent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyParent  $myParent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $parent = $this->parentService->getId($id);
        $bloodGroups = BloodGroup::all();

        return view('admin.parents.edit',compact('parent','bloodGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyParent  $myParent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$id)
    {
        //
        $parent = $this->parentService->getId($id);
        if($parent){
            Storage::delete('public/storage/'.$parent->image);
            $this->parentService->update($request,$id);

            return redirect()->route('admin.parents.index')->withSuccess(ucwords($parent->name." ".'info updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyParent  $myParent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $parent = $this->parentService->getId($id);
        if($parent){
            Storage::delete('public/storage/'.$parent->image);
            $this->parentService->delete($id);

            return redirect()->route('admin.parents.index')->withSuccess(ucwords($parent->name." ".'info deleted successfully'));
        }
    }
}
