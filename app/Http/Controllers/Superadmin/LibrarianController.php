<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\User;
use App\Models\Librarian;
use App\Http\Controllers\Controller;
use App\Services\LibrarianService as LibrnService;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CommonUserFormRequest as StoreRequest;
use App\Http\Requests\CommonUserFormRequest as UpdateRequest;

class LibrarianController extends Controller
{
    use ImageUploadTrait;
    protected $librnService; 
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LibrnService $librnService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->librnService = $librnService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $librarians = $this->librnService->all();

        return view('superadmin.librarians.index',compact('librarians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $libraries = Library::all();

        return view('superadmin.librarians.create',compact('libraries'));
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

        $user->librarian()->create([
            'blood_group' => $request->blood_group,
            'image' => $this->verifyAndUpload($request,'image','public/storage/'),
            'gender' => $request->gender,
            'id_no' => $request->id_no,
            'emp_no' => $request->emp_no,
            'dob' => $request->dob,
            'designation' => $request->designation,
            'phone_no' => $request->phone_no,
            'history' => $request->history,
            'position' => $request->position,
            'school_id' => Auth::user()->school->id,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        $user->assignRole('librarian');

        return redirect()->route('superadmin.librarians.index')->withSuccess(ucwords($user->full_name." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $librarian = $this->librnService->getId($id);

        return view('superadmin.librarians.show',compact('librarian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $librarian = $this->librnService->getId($id);
        $libraries = Library::all();

        return view('superadmin.librarians.edit',compact('librarian','libraries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$id)
    {
    	$librarian = $this->librnService->getId($id);
        if($librarian){
            Storage::delete('public/storage/'.$librarian->image);
            $librarian->user()->update([
                'salutation' => $request->salutation,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'school_id' => Auth::user()->school->id,
            ]);

            $librarian->update([
                'blood_group' => $request->blood_group,
                'image' => $this->verifyAndUpload($request,'image','public/storage/'),
                'gender' => $request->gender,
                'id_no' => $request->id_no,
                'emp_no' => $request->emp_no,
                'dob' => $request->dob,
                'designation' => $request->designation,
                'phone_no' => $request->phone_no,
                'history' => $request->history,
                'position' => $request->position,
                'school_id' => Auth::user()->school->id,
                'current_address'   => $request->current_address,
                'permanent_address' => $request->permanent_address
            ]);

            return redirect()->route('superadmin.librarians.index')->withSuccess(ucwords($librarian->user->full_name." ".'info updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$librarian = $this->librnService->getId($id);
        if($librarian){
            Storage::delete('public/storage/'.$librarian->image);
            $user = User::findOrFail($librarian->user_id);
            $user->librarian()->delete();
            $user->delete();
            $user->removeRole('librarian');

            return redirect()->route('superadmin.librarians.index')->withSuccess(ucwords($user->full_name." ".'info deleted successfully'));
        }  
    }
}
