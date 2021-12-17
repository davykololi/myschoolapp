<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model implements Searchable
{
    //
    protected $table = 'timetables';
    protected $fillable = ['file','desc','school_id','class_id','stream_id','exam_id','teacher_id'];

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

    public function exam()
    {
        return $this->belongsTo('App\Models\Exam')->withDefault();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('class','stream','school','teacher','exam',)->get();
    }
}
