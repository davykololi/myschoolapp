<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Intake extends Model implements Searchable
{
    //
    use HasUuids;
    
    protected $table = 'intakes';
    
    protected $fillable = ['name','desc','school_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.intakes.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function students(): HasMany
    {
    	return $this->hasMany('App\Models\Student','intake_id','id');
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function streams(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Stream')->withTimestamps();
    }

    public function fees(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Fee')->withTimestamps();
    }

    public function exams(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('students','school');
    }
}
