<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    use HasFactory;

    protected $table = 'syllabuses';
    protected $fillable = ['']
    /**
    * Get the school record associated with the user.
    */
    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School');
    }
    /**
    * Get the class record associated with the syllabus.
    */
    public function standard(): BelongsTo
    {
        return $this->belongsTo('App\Models\Standard','standard_id');
    }
}
