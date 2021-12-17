<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryExam;
use App\Models\Student;
use App\Models\School;
use App\Models\Department;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Admission;
use App\Models\Timetable;
use App\Models\Mark;
use App\Models\Term;
use App\Models\Year;

class Exam extends Model implements Searchable
{
    //
    protected $table = 'exams';
    protected $fillable = ['name','code','start_date','end_date','school_id','year_id','term_id','category_exam_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.exams.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function category_exam()
    {
    	return $this->belongsTo(CategoryExam::class)->withDefault();
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    public function schools()
    {
    	return $this->belongsTo(School::class)->withDefault();
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class)->withTimestamps();
    }

    public function streams()
    {
        return $this->belongsToMany(Stream::class)->withTimestamps();
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->withTimestamps();
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class)->withTimestamps();
    }

    public function timetables()
    {
        return $this->hasMany(Timetable::class,'exam_id','id');
    }

    public function year()
    {
        return $this->belongsTo(Year::class)->withDefault();
    }

    public function term()
    {
        return $this->belongsTo(Term::class)->withDefault();
    }

    public function marks()
    {
        return $this->hasMany(Mark::class,'exam_id','id');
    }

    public function examYear()
    {
        $year = \App\Models\Exam::select('updated_at')->first();
        return \Carbon\Carbon::parse($year->updated_at,'year');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teachers','students','schools','streams','category_exam')->latest()->get();
    }
}
