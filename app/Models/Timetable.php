<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function class(): BelongsTo
    {
    	return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function stream(): BelongsTo
    {
        return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo('App\Models\Teacher')->withDefault();
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo('App\Models\Exam')->withDefault();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('class','stream','school','teacher','exam',)->get();
    }
}
