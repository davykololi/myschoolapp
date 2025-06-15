<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Syllabus extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'syllabuses';
    protected $fillable = ['']

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;
    
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
