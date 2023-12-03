<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meeting extends Model implements Searchable
{
    //
    protected $table = 'meetings';
    protected $fillable = ['name','agenda','date','venue','start_at','end_at','code','school_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.meetings.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
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

    public function staffs(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Staff')->withTimestamps();
    }

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Department')->withTimestamps();
    }

    public function streams(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Stream')->withTimestamps();
    }

    public function dormitories(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Dormitory')->withTimestamps();
    }

    public function libraries(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Library')->withTimestamps();
    }

    public function assignments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function clubs(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Club')->withTimestamps();
    }

    public function getDate()
    {
        $date = $this->date;
        $new_date = date("jS,F,Y",strtotime($date));

        return $new_date;
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teachers','students','school','streams','staffs','departments','dormitories','libraries','clubs')->get();
    }
}
