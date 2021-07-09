<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\School;
use App\Models\CategoryField;
use Illuminate\Http\Request;

class FieldController extends Controller
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
        //
        $fields = Field::with('school','category_field')->get();

        return view('admin.fields.index',compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoryFields = CategoryField::all();

        return view('admin.fields.create',compact('categoryFields'));
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
        $input['code'] = strtoupper(Str::random(15));
        $input['school_id'] = Auth::user()->school->id;
        $input['category_field_id'] = $request->field_category;
        $field = Field::create($input);

        return redirect()->route('admin.fields.index')->withSuccess(ucwords($field->name." ".'created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
        return view('admin.fields.show',compact('field'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(Field $field)
    {
        //
        $schools = School::all();
        $categoryFields = CategoryField::all();

        return view('admin.fields.edit',compact('field','schools','categoryFields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        //
        $input = $request->only(['name']);
        $input['school_id'] = Auth::user()->school->id;
        $input['category_field_id'] = $request->field_category;
        $field->update($input);

        return redirect()->route('admin.fields.index')->withSuccess(ucwords($field->name." ".'updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {
        //
        $field->delete();

        return redirect()->route('admin.fields.index')->withSuccess(ucwords($field->name." ".'deleted successfully'));
    }
}
