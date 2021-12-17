<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model implements Searchable
{
    use HasFactory;
    protected $table = 'notes';
    protected $fillable = ['file','desc','school_id','class_id','stream_id','department_id','teacher_id','subject_id','standard_subject_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.notes.show', $this->id);

        return new SearchResult(
                $this,
                $this->desc,
                $url
            );
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function class()
    {
    	return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function stream()
    {
        return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department')->withDefault();
    }

    public function teacher()
    {
    	return $this->belongsTo('App\Models\Teacher')->withDefault();
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject')->withDefault();
    }

    public function standard_subject()
    {
        return $this->belongsTo('App\Models\StandardSubject')->withDefault();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','class','stream','department','teacher','subject','standard_subject')->get();
    }
}
