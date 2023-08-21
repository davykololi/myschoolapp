<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model implements Searchable
{
    //
    protected $table = 'dormitories';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','code','bed_no','dom_head','ass_head','school_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.dormitories.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function students()
    {
    	return $this->hasMany('App\Models\Student','dormitory_id','id');
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function meetings()
    {
        return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
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
        return $query->with('students','school')->get();
    }
}
