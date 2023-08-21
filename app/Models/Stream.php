<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\StandardSubject;
use App\Models\Book;
use App\Models\Student;
use App\Models\Syllabus;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model implements Searchable
{
    use HasFactory;
    protected $table = 'streams';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','code','stream_section_id','school_id','class_id'];
    protected $append = ['balances'];

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

    public function stream_subject_teachers()
    {
        return $this->hasMany('App\Models\StreamSubjectTeacher','stream_id','id');
    }

    public function stream_subjects_number()
    {
        return $this->belongsToMany('App\Models\Subject')->withTimestamps()->count();
    }

    public function intakes()
    {
        return $this->belongsToMany('App\Models\Intake')->withTimestamps();
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

    public function books()
    {
        return $this->hasMany(Book::class,'stream_id','id');
    }

    public function notes()
    {
        return $this->hasMany('App\Models\Note','stream_id','id');
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
        return $query->with('teachers','students','school','class','stream_subject_teachers','stream_section');
    }

    public function grades()
    {
        return $this->hasManyThrough('App\Models\Grade','App\Models\MyClass','stream_id','class_id','id');
    }

    public function males()
    {
        return $this->hasMany('App\Models\Student','stream_id','id')->where(['gender'=>'Male'])->count();
    }

    public function females()
    {
        return $this->hasMany('App\Models\Student','stream_id','id')->where(['gender'=>'Female'])->count();
    }

    public function getBalancesAttribute()
    {
        $vv = Student::with('school','libraries','teachers','class','stream','clubs','payments','payment_records')->get()->sortBy('fee_balance')->toArray();
        $streamStudentsBalance = $vv->sum();

        return $streamStudentsBalance;
    }
}
