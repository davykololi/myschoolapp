<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

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

    public function teachers()
    {
    	return $this->belongsToMany('App\Models\Teacher')->withTimestamps();
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function staffs()
    {
        return $this->belongsToMany('App\Models\Staff')->withTimestamps();
    }

    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }

    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject','department_id','id');
    }

    public function meetings()
    {
        return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function rewards()
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function notes()
    {
        return $this->hasMany('App\Models\Note','department_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teachers','school',)->get();
    }
}
