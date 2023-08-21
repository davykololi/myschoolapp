<?php

namespace App\Models;

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
use App\Models\Grade;
use App\Models\GeneralGrade;
use App\Models\ReportComment;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model implements Searchable
{
    //
    protected $table = 'exams';
    protected $fillable = ['name','code','type','start_date','end_date','status','results_published','school_id','year_id','term_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.exams.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function midTermExam()
    {
        return $this->type === 'Mid Term Enaminations';
    }

    public function endTermExam()
    {
        return $this->type === 'End Term Enaminations';
    }

    public function mockExam()
    {
        return $this->type === 'Mock Enaminations';
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    public function school()
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
        return $query->with('teachers','students','school','streams','year','term','marks','grades','general_grades')->latest()->get();
    }

    public function grades()
    {
        return $this->hasMany(Grade::class,'exam_id','id');
    }

    public function general_grades()
    {
        return $this->hasMany(GeneralGrade::class,'exam_id','id');
    }

    public function report_comments()
    {
        return $this->hasMany(ReportComment::class,'exam_id','id');
    }

    public function name(): Attribute 
    {               
        return  new Attribute(                                                           
            get: fn ($value) => ucfirst($value),                
        ); 
    }
}
