<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model implements Searchable
{
    //
    protected $table = 'timetables';
    protected $fillable = ['file','desc','class_id','stream_id','school_id','teacher_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.timetables.show', $this->id);

        return new SearchResult(
                $this,
                $this->desc,
                $url
            );
    }

    public function class()
    {
    	return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function stream()
    {
        return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher')->withDefault();
    }

    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }
}
