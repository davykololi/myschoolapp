<?php

namespace App\Models;

use App\Models\Letter;
use App\Models\Subject;
use App\Models\StandardSubject;
use App\Models\Mark;
use App\Models\MyClass;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $table = 'schools';
    protected $fillable = ['name','initials','code','head','ass_head','motto','vision','mission','email','postal_address','core_values','image','category_school_id'];

    public function category_school()
    {
        return $this->belongsTo('App\Models\CategorySchool')->withDefault();
    }

    public function admins()
    {
    	return $this->hasMany('App\Models\Admin','school_id','id');
    }

    public function classes()
    {
        return $this->hasMany(MyClass::class,'school_id','id');
    }

    public function streams()
    {
        return $this->hasManyThrough('App\Models\Stream','App\Models\MyClass','school_id','class_id','id');
    }

    public function students()
    {
    	return $this->hasMany('App\Models\Student','school_id','id');
    }

    public function teachers()
    {
        return $this->hasMany('App\Models\Teacher','school_id','id');
    }

    public function staffs()
    {
        return $this->hasMany('App\Models\Staff','school_id','id');
    }

    public function exams()
    {
        return $this->hasMany('App\Models\Exam','school_id','id');
    }

    public function departments()
    {
        return $this->hasMany('App\Models\Department','school_id','id');
    }

    public function assignments()
    {
        return $this->hasMany('App\Models\Assignment','school_id','id');
    }

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject','school_id','id');
    }

    public function intakes()
    {
        return $this->hasMany('App\Models\Intake','school_id','id');
    }

    public function dormitories()
    {
        return $this->hasMany('App\Models\Dormitory','school_id','id');
    }

    public function libraries()
    {
        return $this->hasMany('App\Models\Library','school_id','id');
    }

    public function fees()
    {
        return $this->hasMany('App\Models\Fee','school_id','id');
    }

    public function meetings()
    {
        return $this->hasMany('App\Models\Meeting','school_id','id');
    }

    public function rewards()
    {
        return $this->hasMany('App\Models\Reward','school_id','id');
    }

    public function clubs()
    {
        return $this->hasMany('App\Models\Club','school_id','id');
    }

    public function halls()
    {
        return $this->hasMany('App\Models\Hall','school_id','id');
    }

    public function farms()
    {
        return $this->hasMany('App\Models\Farm','school_id','id');
    }

    public function fields()
    {
        return $this->hasMany('App\Models\Field','school_id','id');
    }

    public function books()
    {
        return $this->hasMany('App\Models\Book','school_id','id');
    }

    public function timetables()
    {
        return $this->hasManyThrough('App\Models\Timetable','App\Models\Standard','school_id','id');
    }

    public function standard_subjects()
    {
        return $this->hasManyThrough(StandardSubject::class,Subject::class,'school_id','subject_id','id');
    }

    public function notes()
    {
        return $this->hasMany('App\Models\Note','school_id','id');
    }

    public function syllabuses()
    {
        return $this->hasMany('App\Models\Syllabus','school_id','id');
    }

    public function matrons()
    {
        return $this->hasMany('App\Models\Matron','school_id','id');
    }

    public function accountants()
    {
        return $this->hasMany('App\Models\Accountant','school_id','id');
    }

    public function librarians()
    {
        return $this->hasMany('App\Models\Librarian','school_id','id');
    }

    public function parents()
    {
        return $this->hasMany('App\Models\MyParent','school_id','id');
    }

    public function kitchens()
    {
        return $this->hasMany('App\Models\Kitchen','school_id','id');
    }

    public function letters()
    {
        return $this->hasMany('App\Models\Letter','school_id','id');
    }

    public function marks()
    {
        return $this->hasMany(Mark::class,'school_id','id');
    }

    public function attendances()
    {
        return $this->hasMany('App\Models\Attendance','school_id','id');
    }
}
