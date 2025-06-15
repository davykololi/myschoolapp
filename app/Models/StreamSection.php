<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class StreamSection extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'stream_sections';
    
    protected $fillable = ['name','desc','initials','school_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function streams(): HasMany
    {
        return $this->hasMany('App\Models\Stream','stream_section_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('streams','school')->get();
    }

    public function name(): Attribute 
    {               
        return  new Attribute(                                                           
            get: fn ($value) => ucfirst($value),                
        ); 
    }

    public function initials(): Attribute 
    {               
        return  new Attribute(                                                           
            get: fn ($value) => strtoupper($value),                
        ); 
    }
}
