<?php

namespace App\Models;

use Auth;
use App\Models\School;
use App\Models\Teacher;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\Note;
use App\Models\Mark;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class StreamSubject extends Model implements Searchable
{
    use HasFactory, HasUuids;

    protected $table = 'stream_subjects';
    protected $fillable = ['desc','school_id','teacher_id','stream_id','subject_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.streamsubject.show', $this->id);

        return new SearchResult(
                $this,
                $this->desc,
                $url
            );
    }

    public function teacher(): BelongsTo
    {
    	return $this->belongsTo(Teacher::class)->withDefault();
    }

    public function stream(): BelongsTo
    {
    	return $this->belongsTo(Stream::class)->withDefault();
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo(School::class)->withDefault();
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class)->withDefault();
    }

    public function marks(): HasMany
    {
        return $this->hasMany(Mark::class,'subject_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teacher.user','stream','school','subject');
    }

    public function notes(): HasManyThrough
    {
        return $this->hasManyThrough(Note::class,Stream::class,'stream_id','stream_subject_id','id');
    }
}
