<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\GameCatService;
use Illuminate\Http\Request;
use App\Http\Requests\GameCatFormRequest as StoreRequest;
use App\Http\Requests\GameCatFormRequest as UpdateRequest;

class CategoryGameController extends Controller
{
    protected $gameCatService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GameCatService $gameCatService)
    {
        $this->middleware('auth:admin');
        $this->gameCatService = $gameCatService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoryGames = $this->gameCatService->all();

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
    public function store(StoreRequest $request)
    {
        //
        $categoryGame = $this->gameCatService->create($request);

        return redirect()->route('admin.category-games.index')->withSuccess(ucwords($categoryGame->name." ".'category created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryGame  $categoryGame
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $categoryGame = $this->gameCatService->getId($id);

        return view('admin.category-games.show',compact('categoryGame'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryGame  $categoryGame
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categoryGame = $this->gameCatService->getId($id);

        return view('admin.category-games.edit',compact('categoryGame'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryGame  $categoryGame
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $categoryGame = $this->gameCatService->getId($id);
        if($categoryGame){
            $this->gameCatService->update($request,$id);

            return redirect()->route('admin.category-games.index')->withSuccess(ucwords($categoryGame->name." ".'category updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryGame  $categoryGame
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categoryGame = $this->gameCatService->getId($id);
        if($categoryGame){
            $this->gameCatService->delete($id);

            return redirect()->route('admin.category-games.index')->withSuccess(ucwords($categoryGame->name." ".'category deleted successfully!'));
        }
    }
}
