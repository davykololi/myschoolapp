<?php

namespace App\Models;

use App\Models\School;
use App\Models\Teacher;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\Note;
use App\Models\Mark;
use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardSubject extends Model implements Searchable
{
    use HasFactory;

    protected $table = 'standard_subjects';
    protected $fillable = ['desc','school_id','teacher_id','stream_id','subject_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.subs.show', $this->id);

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

    public function notes()
    {
        return $this->hasMany(Note::class,'standard_subject_id','id');
    }

    public function marks()
    {
        return $this->hasMany(Mark::class,'standard_subject_id','id');
    }
}
