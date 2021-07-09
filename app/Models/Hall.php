<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model implements Searchable
{
    //
    protected $table = 'halls';
    protected $fillable = ['name','code','school_id','category_hall_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.halls.show', $this->id);

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

    public function category_hall()
    {
        return $this->belongsTo('App\Models\CategoryHall')->withDefault();
    }

    public function students()
    {
    	return $this->belongsToMany('App\Models\Student')->withTimestamps();
    }

    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function rewards()
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }
}
