<?php

namespace App\Models;

use Auth;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Note extends Model implements Searchable
{
    use HasFactory, HasUuids;
    protected $table = 'notes';
    protected $fillable = ['file','desc','class_id','stream_id','teacher_id','subject_id','stream_subject_id','school_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.notes.show', $this->id);

        return new SearchResult(
                $this,
                $this->desc,
                $url
            );
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function class(): BelongsTo
    {
    	return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function stream(): BelongsTo
    {
        return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function teacher(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Teacher')->withDefault();
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo('App\Models\Subject')->withDefault();
    }

    public function stream_subject(): BelongsTo
    {
        return $this->belongsTo('App\Models\StreamSubject')->withDefault();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','class','stream','teacher.user','subject');
    }
}
