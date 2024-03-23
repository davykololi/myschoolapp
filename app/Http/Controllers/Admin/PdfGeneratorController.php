<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\PdfGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PdfGeneratorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pdfGenerators = PdfGenerator::with('school')->latest('id')->get();

        return view('admin.pdf-generators.index',compact('pdfGenerators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pdf-generators.create');
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
        $input['school_id'] = auth()->user()->school->id;
        $pdfGenerator = PdfGenerator::create($input);

        return redirect()->route('admin.pdf-generators.index')->withSuccess(ucwords('The pdf info created successfully'));
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
        $pdfGenerator = PdfGenerator::findOrFail($id);

        return view('admin.pdf-generators.show',compact('pdfGenerator'));
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
        $pdfGenerator = PdfGenerator::findOrFail($id);

        return view('admin.pdf-generators.edit',compact('pdfGenerator'));
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
        $pdfGenerator = PdfGenerator::findOrFail($id);
        $input = $request->all();
        $input['school_id'] = auth()->user()->school->id;
        $pdfGenerator->update($input);

        return redirect()->route('admin.pdf-generators.index')->withSuccess(ucwords('The pdf info updated successfully'));
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
        $pdfGenerator = PdfGenerator::findOrFail($id);
        $pdfGenerator->delete();

        return redirect()->route('admin.pdf-generators.index')->withSuccess(ucwords('The pdf info deleted successfully'));
    }
}
