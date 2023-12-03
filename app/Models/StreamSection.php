<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StreamSection extends Model
{
    use HasFactory;

    protected $table = 'stream_sections';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','desc','initials','school_id'];

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
}
