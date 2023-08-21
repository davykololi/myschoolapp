<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Kitchen extends Model implements Searchable
{
    //
    protected $table = 'kitchens';
    protected $fillable = ['name','type','code','school_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.kitchens.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function studentsKitchen()
    {
        return $this->type === 'Students Kitchen';
    }

    public function teachersKichen()
    {
        return $this->type === 'Teachers Kitchen';
    }

    public function visitorsKitchen()
    {
        return $this->type === 'Visitors Kitchen';
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
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
