<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\StandardSubject;
use App\Models\Book;
use App\Models\Syllabus;
use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model implements Searchable
{
    use HasFactory;
    protected $table = 'streams';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','code','stream_section_id','school_id','class_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.streams.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function School()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function class()
    {
        return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function marks()
    {
        return $this->hasMany('App\Models\Mark','stream_id','id');
    }

    public function stream_section()
    {
        return $this->belongsTo('App\Models\StreamSection')->withDefault();
    }

    public function students()
    {
    	return $this->hasMany('App\Models\Student','stream_id','id');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher')->withTimestamps();
    }

    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }

    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Models\Subject')->withTimestamps();
    }

    public function intakes()
    {
        return $this->belongsToMany('App\Models\Intake')->withTimestamps();
    }

    public function fee()
    {
        return $this->hasOne('App\Models\Fee','stream_id','id');
    }

    public function meetings()
    {
        return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function rewards()
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function clubs()
    {
        return $this->belongsToMany('App\Models\Club')->withTimestamps();
    }

    public function games()
    {
        return $this->belongsToMany('App\Models\Game')->withTimestamps();
    }

    public function timetables()
    {
        return $this->hasMany('App\Models\Timetable','stream_id','id');
    }

    public function standard_subjects()
    {
        return $this->hasMany(StandardSubject::class,'stream_id','id');
    }

    public function books()
    {
        return $this->hasMany(Book::class,'stream_id','id');
    }

    public function notes()
    {
        return $this->hasManyThrough('App\Models\Note','App\Models\MyClass','stream_id','class_id','id');
    }

    public function syllabues()
    {
        return $this->hasMany(Syllabus::class,'stream_id','id');
    }

    public function report_cards()
    {
        return $this->hasMany('App\Models\ReportCard','stream_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teachers','students','school','class')->get();
    }

    public function grade_systems()
    {
        return $this->hasMany('App\Models\GradeSystem','stream_id','id');
    }
}
