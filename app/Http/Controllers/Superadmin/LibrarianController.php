<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\SchoolService;
use App\Services\LibrarianService as LibrnService;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LibrarianFormRequest as StoreRequest;
use App\Http\Requests\LibrarianFormRequest as UpdateRequest;

class LibrarianController extends Controller
{
    protected $librnService; 
    protected $schoolService;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LibrnService $librnService,SchoolService $schoolService)
    {
        $this->middleware('auth:superadmin');
        $this->middleware('superadmin2fa');
        $this->librnService = $librnService;
        $this->schoolService = $schoolService;
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
        $schools = $this->schoolService->all();
        $libraries = Library::all();

        return view('superadmin.librarians.create',compact('schools','libraries'));
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
        $librarian = $this->librnService->create($request);
        if(!$librarian){
            return redirect()->route('superadmin.librarians.index')->withErrors('Ooop!, An error occured. Please try again later!');
        }
            return redirect()->route('superadmin.librarians.index')->withSuccess(ucwords($librarian->name." ".'info created successfully'));
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
        $schools = $this->schoolService->all();
        $libraries = Library::all();

        return view('superadmin.librarians.edit',compact('librarian','schools','libraries'));
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
            $this->librnService->update($request,$id);

        	return redirect()->route('superadmin.librarians.index')->withSuccess(ucwords($librarian->name." ".'info updated successfully'));
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
        	$this->librnService->delete($id);

        	return redirect()->route('superadmin.librarians.index')->withSuccess(ucwords($librarian->name." ".'info deleted successfully'));
        }
    }
}
