<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\GameCatService;
use App\Services\GameService;
use Illuminate\Http\Request;
use App\Http\Requests\GameFormRequest as StoreRequest;
use App\Http\Requests\GameFormRequest as UpdateRequest;

class GameController extends Controller
{
    protected $gameCatService,$gameService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GameService $gameService,GameCatService $gameCatService)
    {
        $this->middleware('auth:admin');
        $this->gameService = $gameService;
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
        $games = $this->gameService->all();

        return view('admin.games.index',compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoryGames = $this->gameCatService->all();

        return view('admin.games.create',compact('categoryGames'));
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
        $game = $this->gameService->create($request);

        return redirect()->route('admin.games.index')->withSuccess(ucwords($game->name." ".'created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $game = $this->gameService->getId($id);

        return view('admin.games.show',compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $game = $this->gameService->getId($id);
        $categoryGames = $this->gameCatService->all();

        return view('admin.games.edit',compact('game','categoryGames'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $game = $this->gameService->getId($id);
        if($game){
            $this->gameService->update($request,$id);

            return redirect()->route('admin.games.index')->withSuccess(ucwords($game->name." ".'updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $game = $this->gameService->getId($id);
        if($game){
            $this->gameService->delete($id);

            return redirect()->route('admin.games.index')->withSuccess(ucwords($game->name." ".'deleted successfully'));
        }
    }
}
