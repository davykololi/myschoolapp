<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Farm extends Model implements Searchable
{
    //
    protected $table = 'farms';
    protected $fillable = ['name','code','type','school_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.farms.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function westEndFarm()
    {
        return $this->type === 'West End Farm';
    }

    public function eastEndFarm()
    {
        return $this->type === 'East End Farm';
    }

    public function lakisamaFarm()
    {
        return $this->type === 'Lakisama Farm';
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function assignments(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function rewards(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school')->get();
    }
}
