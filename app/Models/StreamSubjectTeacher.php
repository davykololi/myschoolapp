<?php

namespace App\Models;

use App\Models\School;
use App\Models\Teacher;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\Note;
use App\Models\Mark;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StreamSubjectTeacher extends Model implements Searchable
{
    use HasFactory;

    protected $table = 'stream_subject_teachers';
    protected $fillable = ['desc','school_id','teacher_id','stream_id','subject_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.streamsubjectteacher.show', $this->id);

        return new SearchResult(
                $this,
                $this->desc,
                $url
            );
    }

    public function teacher()
    {
    	return $this->belongsTo(Teacher::class)->withDefault();
    }

    public function stream()
    {
    	return $this->belongsTo(Stream::class)->withDefault();
    }

    public function school()
    {
    	return $this->belongsTo(School::class)->withDefault();
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class)->withDefault();
    }

    public function marks()
    {
        return $this->hasMany(Mark::class,'subject_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teacher','stream','school','subject')->get();
    }
}
