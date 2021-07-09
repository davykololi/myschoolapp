<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\PositionLibrarian;
use Illuminate\Http\Request;

class PositionLibrarianController extends Controller
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
        $positionLibrarians = PositionLibrarian::get();

        return view('superadmin.position-librarians.index',compact('positionLibrarians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.position-librarians.create');
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
        $input['slug'] = Str::slug($request->name,'-');
        PositionLibrarian::create($input);

        return redirect()->route('superadmin.position-librarians.index')->withSuccess('The librarian role created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionLibrarian  $positionLibrarian
     * @return \Illuminate\Http\Response
     */
    public function show(PositionLibrarian $positionLibrarian)
    {
        //
        return view('superadmin.position-librarians.show',compact('positionLibrarian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionLibrarian  $positionLibrarian
     * @return \Illuminate\Http\Response
     */
    public function edit(PositionLibrarian $positionLibrarian)
    {
        //
        return view('superadmin.position-librarians.edit',compact('positionLibrarian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionLibrarian  $positionLibrarian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PositionLibrarian $positionLibrarian)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $positionLibrarian->update($input);

        return redirect()->route('superadmin.position-librarians.index')->withSuccess('The librarian role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionLibrarian  $positionLibrarian
     * @return \Illuminate\Http\Response
     */
    public function destroy(PositionLibrarian $positionLibrarian)
    {
        //
        $positionLibrarian->delete();

        return redirect()->route('superadmin.position-librarians.index')->withSuccess('The librarian role deleted successfully!');
    }
}
