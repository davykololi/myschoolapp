<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model implements Searchable
{
    //
    protected $table = 'halls';
    protected $fillable = ['name','type','code','school_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.halls.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function madibaHall()
    {
        return $this->type === 'Madiba Hall';
    }

    public function magufuliHall()
    {
        return $this->type === 'Magufuli Hall';
    }

    public function theatreHall()
    {
        return $this->type === 'Theatre Hall';
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
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

    public function scopeEagerLoaded($query)
    {
        return $query->with('school')->get();
    }
}
