<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model implements Searchable
{
    //
    protected $table = 'departments';
    protected $fillable = ['name','code','phone_no','head_name','asshead_name','motto','vision','mission','school_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.departments.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
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

    public function exams(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }

    public function assignments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function subjects(): HasMany
    {
        return $this->hasMany('App\Models\Subject','department_id','id');
    }

    public function meetings(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function rewards(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function notes(): HasMany
    {
        return $this->hasMany('App\Models\Note','department_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teachers','school','staffs','exams','assignments','subjects','meetings','notes')->get();
    }
}
