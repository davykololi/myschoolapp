<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $table = 'events';
    use HasFactory;

    /**
     * Get the school record associated with the user.
    */
    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }
}
