<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model implements Searchable
{
    //
    protected $table = 'farms';
    protected $fillable = ['name','code','school_id','category_farm_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.farms.show', $this->id);

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

    public function category_farm()
    {
        return $this->belongsTo('App\Models\CategoryFarm')->withDefault();
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
