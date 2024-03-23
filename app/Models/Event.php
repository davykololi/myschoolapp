<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School');
    }
}
