<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CategoryGame;
use Illuminate\Http\Request;

class CategoryGameController extends Controller
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
        $categoryGames = CategoryGame::get();

        return view('admin.category-games.index',compact('categoryGames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category-games.create');
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
        CategoryGame::create($input);

        return redirect()->route('admin.category-games.index')->withSuccess('The game category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryGame  $categoryGame
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryGame $categoryGame)
    {
        //
        return view('admin.category-games.show',compact('categoryGame'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryGame  $categoryGame
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryGame $categoryGame)
    {
        //
        return view('admin.category-games.edit',compact('categoryGame'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryGame  $categoryGame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryGame $categoryGame)
    {
        //
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        $categoryGame->update($input);

        return redirect()->route('admin.category-games.index')->withSuccess('The game category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryGame  $categoryGame
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryGame $categoryGame)
    {
        //
        $categoryGame->delete();

        return redirect()->route('admin.category-games.index')->withSuccess('The game category deleted successfully!');
    }
}
