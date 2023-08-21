<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Intake extends Model implements Searchable
{
    //
    protected $table = 'intakes';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','desc','school_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.intakes.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function students()
    {
    	return $this->hasMany('App\Models\Student','intake_id','id');
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function streams()
    {
        return $this->belongsToMany('App\Models\Stream')->withTimestamps();
    }

    public function fees()
    {
        return $this->belongsToMany('App\Models\Fee')->withTimestamps();
    }

    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('students','school')->get();
    }
}
