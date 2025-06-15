<?php

namespace App\Models;

use App\Models\School;
use App\Models\Stream;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class StreamHeadTeacher extends Model
{
    //
    use HasUuids;

    protected $table = 'stream_head_teachers';
    
    protected $fillable = ['name','name_initials','description','stream_id','school_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function stream(): BelongsTo
    {
        return $this->belongsTo(Stream::class)->withDefault();
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class)->withDefault();
    }

    public function name(): Attribute 
    {               
        return  new Attribute(                                                           
            set: fn ($value) => ucwords($value),                
        ); 
    }

    public function nameInitials(): Attribute 
    {               
        return  new Attribute(                                                           
            set: fn ($value) => strtoupper($value),                
        ); 
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('stream','school')->latest();
    }
}
