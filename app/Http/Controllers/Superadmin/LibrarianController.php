<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\PositionLibrarian;
use App\Models\Librarian;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;

class LibrarianController extends Controller
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
        $librarians = Librarian::with('school','position_librarian')->get();

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
        $schools = School::all();
        $libraries = Library::all();
        $librarianRoles = PositionLibrarian::all();

        return view('superadmin.librarians.create',compact('schools','libraries','librarianRoles'));
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
        $input['library_id'] = $request->library;
        $input['position_librarian_id'] = $request->librarian_role;
        $input['password'] = Hash::make($request->password);
        $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        Librarian::create($input);

        return redirect()->route('superadmin.librarians.index')->withSuccess('The librarian created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function show(Librarian $librarian)
    {
        //
        return view('superadmin.librarians.show',compact('librarian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function edit(Librarian $librarian)
    {
        //
        $schools = School::all();
        $libraries = Library::all();
        $librarianRoles = PositionLibrarian::all();

        return view('superadmin.librarians.edit',compact('librarian','schools','libraries','librarianRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Librarian $librarian)
    {
        if($librarian){
            Storage::delete('public/storage/'.$librarian->image);
            $input=$request->only('title','first_name','middle_name','last_name','dob','email','current_address','permanent_address','phone_no','id_no','designation','emp_no');
        	$input['school_id'] = $request->school;
            $input['library_id'] = $request->library;
            $input['position_librarian_id'] = $request->librarian_role;
        	$input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        	$librarian->update($input);

        	return redirect()->route('superadmin.librarians.index')->withSuccess('The librarian updated successfully');
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Librarian $librarian)
    {
        if($librarian){
            Storage::delete('public/storage/'.$librarian->image);
        	$librarian->delete();

        	return redirect()->route('superadmin.librarians.index')->withSuccess('The librarian deleted successfully');
        }
    }
}
