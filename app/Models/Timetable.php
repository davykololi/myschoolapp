<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Timetable extends Model implements Searchable
{
    //
    use HasUuids;
    
    protected $table = 'timetables';
    protected $fillable = ['file','desc','school_id','class_id','stream_id','exam_id','teacher_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

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
        return $query->with('class','stream','school','teacher','exam');
    }

    public function scopeStreamTimetable($query)
    {
        return $query->has($this->stream())->get();
    }

    public function scopeExamTimetable($query)
    {
        return $query->has($this->exam())->get();
    }
}
