<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use App\Models\Student;
use App\Models\MyParent;
use App\Http\Controllers\Controller;
use App\Services\ParentService;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ParentFormRequest as StoreRequest;
use App\Http\Requests\ParentFormRequest as UpdateRequest;
use Illuminate\Support\Facades\Hash;

class MyParentController extends Controller
{
    use ImageUploadTrait;
    protected $parentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ParentService $parentService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
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
        $user = User::create([
            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'school_id' => Auth::user()->school->id,
        ]);

        $user->parent()->create([
            'image' => $this->verifyAndUpload($request,'image','public/storage/'),
            'gender' => $request->gender,
            'id_no' => $request->id_no,
            'phone_no' => $request->phone_no,
            'school_id' => Auth::user()->school->id,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        $user->assignRole('parent');

        return redirect()->route('admin.parents.index')->withSuccess(ucwords($user->full_name." ".'info created successfully'));
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
        $parentChildren = $myParent->children()->eagerLoaded()->get();

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
        $parent = MyParent::findOrFail($id);
        if($parent){
            Storage::delete('public/storage/'.$parent->image);
            $parent->user()->update([
                'salutation' => $request->salutation,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'school_id' => Auth::user()->school->id,
            ]);

            $parent->update([
                'image' => $this->verifyAndUpload($request,'image','public/storage/'),
                'gender' => $request->gender,
                'id_no' => $request->id_no,
                'phone_no' => $request->phone_no,
                'school_id' => Auth::user()->school->id,
                'current_address'   => $request->current_address,
                'permanent_address' => $request->permanent_address
            ]);

            return redirect()->route('admin.parents.index')->withSuccess(ucwords($parent->user->full_name." ".'info updated successfully'));
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
        $parent = MyParent::findOrFail($id);
        if($parent){
            Storage::delete('public/storage/'.$parent->image);
            $user = User::findOrFail($parent->user_id);
            $user->parent()->delete();
            $user->delete();
            $user->removeRole('parent');

            return redirect()->route('admin.parents.index')->withSuccess(ucwords($user->full_name." ".'info deleted successfully'));
        } 
    }
}
