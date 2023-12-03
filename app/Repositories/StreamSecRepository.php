<?php

namespace App\Repositories;

use App\Interfaces\StreamSecInterface;
use App\Models\StreamSection as StreamSec;

class StreamSecRepository implements StreamSecInterface
{
	protected $streamSec;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StreamSec $streamSec)
    {
        $this->streamSec = $streamSec;
    }

    public function all()
    {
        return $this->streamSec->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->streamSec->create($data);
    }

    public function getId($id)
    {
    	return $this->streamSec->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->streamSec->destroy($id);
    }
}