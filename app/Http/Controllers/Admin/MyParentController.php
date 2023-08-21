<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use App\Services\ParentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ParentFormRequest as StoreRequest;
use App\Http\Requests\ParentFormRequest as UpdateRequest;
use Illuminate\Support\Facades\Hash;
use App\Traits\ImageUploadTrait;

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
        $this->middleware('admin2fa');
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
        $myParents = $this->parentService->all();

        return view('admin.parents.index',compact('myParents'));
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
    public function store(StoreRequest $request)
    {
        //
        $myParent = $this->parentService->create($request);

        return redirect()->route('admin.parents.index')->withSuccess(ucwords($myParent->name." ".'info created successfully'));
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
        $myParent = $this->parentService->getId($id);
        $parentChildren = $myParent->children()->with('school','libraries','teachers','class','stream','clubs','payments','payment_records')->get();

        return view('admin.parents.show',compact('myParent','parentChildren'));
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
        $myParent = $this->parentService->getId($id);

        return view('admin.parents.edit',compact('myParent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyParent  $myParent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $myParent = $this->parentService->getId($id);
        if($myParent){
            Storage::delete('public/storage/'.$myParent->image);
            $this->parentService->update($request,$id);

            return redirect()->route('admin.parents.index')->withSuccess(ucwords($myParent->name." ".'info updated successfully'));
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
        $myParent = $this->parentService->getId($id);
        if($myParent){
            Storage::delete('public/storage/'.$myParent->image);
            $myParent->delete();

            return redirect()->route('admin.parents.index')->withSuccess(ucwords($myParent->name." ".'info deleted successfully'));
        }
    }
}
