<?php

namespace App\Repositories;

use App\Interfaces\GameCatInterface;
use App\Models\CategoryGame as GameCat;

class GameCatRepository implements GameCatInterface
{
	protected $gameCat;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GameCat $gameCat)
    {
        $this->gameCat = $gameCat;
    }

    public function all()
    {
        return $this->gameCat->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->gameCat->create($data);
    }

    public function getId($id)
    {
    	return $this->gameCat->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->gameCat->destroy($id);
    }
}