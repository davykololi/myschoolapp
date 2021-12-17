<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Game extends Model implements Searchable
{
    //
    protected $table = 'games';
    protected $fillable = ['name','code','school_id','category_game_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.games.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function category_game()
    {
        return $this->belongsTo('App\Models\CategoryGame')->withDefault();
    }

    public function streams()
    {
    	return $this->belongsToMany('App\Models\Stream')->withTimestamps();
    }

    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function rewards()
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','category_game')->get();
    }
}
