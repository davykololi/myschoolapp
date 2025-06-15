<?php

namespace App\Repositories;

use App\Interfaces\GameInterface;
use App\Models\Game;

class GameRepository implements GameInterface
{
	protected $game;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    public function all()
    {
        return $this->game->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->game->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->game->create($data);
    }

    public function getId($id)
    {
    	return $this->game->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->game->destroy($id);
    }
}