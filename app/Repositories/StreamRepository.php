<?php

namespace App\Repositories;

use App\Interfaces\StreamInterface;
use App\Models\Stream;

class StreamRepository implements StreamInterface
{
	protected $stream;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Stream $stream)
    {
        $this->stream = $stream;
    }

    public function all()
    {
        return $this->stream->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->stream->create($data);
    }

    public function getId($id)
    {
    	return $this->stream->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->stream->destroy($id);
    }
}