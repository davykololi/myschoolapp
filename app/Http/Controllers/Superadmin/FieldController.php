<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\FieldService;
use Illuminate\Http\Request;
use App\Http\Requests\FieldFormRequest as StoreRequest;
use App\Http\Requests\FieldFormRequest as UpdateRequest;

class FieldController extends Controller
{
    protected $fieldService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FieldService $fieldService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->fieldService = $fieldService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fields = $this->fieldService->all();

        return view('superadmin.fields.index',compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.fields.create');
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
        $field = $this->fieldService->create($request);

        return redirect()->route('superadmin.fields.index')->withSuccess(ucwords($field->name." ".'created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $field = $this->fieldService->getId($id);

        return view('superadmin.fields.show',compact('field'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $field = $this->fieldService->getId($id);

        return view('superadmin.fields.edit',compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $field = $this->fieldService->getId($id);
        if($field){
            $this->fieldService->update($request,$id);

            return redirect()->route('superadmin.fields.index')->withSuccess(ucwords($field->name." ".'updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $field = $this->fieldService->getId($id);
        if($field){
            $this->fieldService->delete($id);

            return redirect()->route('superadmin.fields.index')->withSuccess(ucwords($field->name." ".'deleted successfully'));
        }
    }
}
