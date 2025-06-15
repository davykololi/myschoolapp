<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Award extends Model implements Searchable
{
    //
    use HasUuids;
    
    protected $table = 'awards';
    protected $fillable = ['name','type','purpose','date','school_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;
    
    protected $casts = ['created_at' => 'datetime:d-m-Y'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.awards.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function bestPerformClass()
    {
        return $this->type === 'Best Performance Class Award';
    }

    public function bestPerformStream()
    {
        return $this->type === 'Best Performance Stream Award';
    }

    public function students(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Student')->withTimestamps();
    }

    public function teachers(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Teacher')->withTimestamps();
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function subordinates(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Subordinate')->withTimestamps();
    }

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Department')->withTimestamps();
    }

    public function streams(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Stream')->withTimestamps();
    }

    public function libraries(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Library')->withTimestamps();
    }

    public function attendances(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Attendance')->withTimestamps();
    }

    public function clubs(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Club')->withTimestamps();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('students','teachers','school','subordinates','departments','streams','libraries');
    }
}
