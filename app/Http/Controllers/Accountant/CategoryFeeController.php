<?php

namespace App\Http\Controllers\Accountant;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CategoryFee;
use Illuminate\Http\Request;

class CategoryFeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:accountant');
        $this->middleware('accountant2fa');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoryFees = CategoryFee::get();

        return view('accountant.category-fees.index',compact('categoryFees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('accountant.category-fees.create');
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
        CategoryFee::create($input);

        return redirect()->route('accountant.category-fees.index')->withSuccess('The fee category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryFee  $categoryFee
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryFee $categoryFee)
    {
        //
        return view('accountant.category-fees.show',compact('categoryFee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryFee  $categoryFee
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryFee $categoryFee)
    {
        //
        return view('accountant.category-fees.edit',compact('categoryFee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryFee  $categoryFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryFee $categoryFee)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $categoryFee->update($input);

        return redirect()->route('accountant.category-fees.index')->withSuccess('The fee category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryFee  $categoryFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryFee $categoryFee)
    {
        //
        $categoryFee->delete();

        return redirect()->route('accountant.category-fees.index')->withSuccess('The fee category deleted successfully!');
    }
}
