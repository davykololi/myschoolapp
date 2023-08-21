<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $fillable = [
        'title', 
        'start', 
        'end'
    ];    

    /**
     * Get the school record associated with the user.
    */
    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }
}
