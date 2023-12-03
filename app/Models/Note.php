<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model implements Searchable
{
    use HasFactory;
    protected $table = 'notes';
    protected $fillable = ['file','desc','stream_id','teacher_id','subject_id','school_id','department_id'];

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

    public function department(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Department')->withDefault();
    }

    public function teacher(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Teacher')->withDefault();
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo('App\Models\Subject')->withDefault();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','class','stream','department','teacher','subject')->get();
    }
}
