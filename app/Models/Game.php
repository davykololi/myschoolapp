<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model implements Searchable
{
    //
    protected $table = 'games';
    protected $fillable = ['name','code','type','school_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.games.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function soccer()
    {
        return $this->type === 'Soccer';
    }

    public function netball()
    {
        return $this->type === 'Netball';
    }

    public function handball()
    {
        return $this->type === 'Handball';
    }

    public function rugby()
    {
        return $this->type === 'Rugby';
    }

    public function tableTennis()
    {
        return $this->type === 'Table Tennis';
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function streams(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Stream')->withTimestamps();
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
        return $query->with('school','category_game')->get();
    }
}
