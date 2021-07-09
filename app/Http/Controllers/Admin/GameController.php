<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\CategoryGame;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
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
        $games = Game::with('school','category_game')->get();

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
        $categoryGames = CategoryGame::all();

        return view('admin.games.create',compact('categoryGames'));
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
        $input['category_game_id'] = $request->game_category;
        $game = Game::create($input);

        return redirect()->route('admin.games.index')->withSuccess(ucwords($game->name." ".'created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
        return view('admin.games.show',compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
        $categoryGames = CategoryGame::all();

        return view('admin.games.edit',compact('game','categoryGames'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
        $input = $request->only(['name']);
        $input['school_id'] = Auth::user()->school->id;
        $input['category_game_id'] = $request->game_category;
        $game->update($input);

        return redirect()->route('admin.games.index')->withSuccess(ucwords($game->name." ".'updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
        $game->delete();

        return redirect()->route('admin.games.index')->withSuccess(ucwords($game->name." ".'deleted successfully'));
    }
}
