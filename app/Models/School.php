<?php

namespace App\Models;

use App\Models\Letter;
use App\Models\Subject;
use App\Models\StreamSubjectTeacher;
use App\Models\Mark;
use App\Models\Exam;
use App\Models\MyClass;
use App\Models\Gallery;
use App\Models\ReportRemark;
use App\Models\ReportSubjectGrade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class School extends Model
{
    //
    protected $table = 'schools';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','initials','code','head','ass_head','motto','vision','mission','email','postal_address','core_values','image','type'];

    public function nationalSchool()
    {
        return $this->type === "National School";
    }

    public function countySchool()
    {
        return $this->type === "County School";
    }

    public function extraCountySchool()
    {
        return $this->type === "Extra County School";
    }

    public function privateSchool()
    {
        return $this->type === "Private School";
    }

    public function superadmin(): HasOne
    {
    	return $this->hasOne('App\Models\Superadmin','school_id','id');
    }

    public function admins(): HasMany
    {
        return $this->hasMany('App\Models\Admin','school_id','id');
    }

    public function classes(): HasMany
    {
        return $this->hasMany(MyClass::class,'school_id','id');
    }

    public function streams(): HasManyThrough
    {
        return $this->hasManyThrough('App\Models\Stream','App\Models\MyClass','school_id','class_id','id');
    }

    public function students(): HasMany
    {
    	return $this->hasMany('App\Models\Student','school_id','id');
    }

    public function teachers(): HasMany
    {
        return $this->hasMany('App\Models\Teacher','school_id','id');
    }

    public function staffs(): HasMany
    {
        return $this->hasMany('App\Models\Staff','school_id','id');
    }

    public function exams(): HasMany
    {
        return $this->hasMany('App\Models\Exam','school_id','id');
    }

    public function departments(): HasMany
    {
        return $this->hasMany('App\Models\Department','school_id','id');
    }

    public function assignments(): HasMany
    {
        return $this->hasMany('App\Models\Assignment','school_id','id');
    }

    public function subjects(): HasMany
    {
        return $this->hasMany('App\Models\Subject','school_id','id');
    }

    public function intakes(): HasMany
    {
        return $this->hasMany('App\Models\Intake','school_id','id');
    }

    public function dormitories(): HasMany
    {
        return $this->hasMany('App\Models\Dormitory','school_id','id');
    }

    public function libraries(): HasMany
    {
        return $this->hasMany('App\Models\Library','school_id','id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany('App\Models\Payment','school_id','id');
    }

    public function meetings(): HasMany
    {
        return $this->hasMany('App\Models\Meeting','school_id','id');
    }

    public function rewards(): HasMany
    {
        return $this->hasMany('App\Models\Reward','school_id','id');
    }

    public function clubs(): HasMany
    {
        return $this->hasMany('App\Models\Club','school_id','id');
    }

    public function halls(): HasMany
    {
        return $this->hasMany('App\Models\Hall','school_id','id');
    }

    public function farms(): HasMany
    {
        return $this->hasMany('App\Models\Farm','school_id','id');
    }

    public function fields(): HasMany
    {
        return $this->hasMany('App\Models\Field','school_id','id');
    }

    public function books(): HasMany
    {
        return $this->hasMany('App\Models\Book','school_id','id');
    }

    public function timetables(): HasMany
    {
        return $this->hasMany('App\Models\Timetable','school_id','id');
    }

    public function stream_subject_teachers(): HasManyThrough
    {
        return $this->hasManyThrough(StreamSubjectTeacher::class,Subject::class,'school_id','subject_id','id');
    }

    public function notes(): HasMany
    {
        return $this->hasMany('App\Models\Note','school_id','id');
    }

    public function syllabuses(): HasMany
    {
        return $this->hasMany('App\Models\Syllabus','school_id','id');
    }

    public function matrons(): HasMany
    {
        return $this->hasMany('App\Models\Matron','school_id','id');
    }

    public function accountants(): HasMany
    {
        return $this->hasMany('App\Models\Accountant','school_id','id');
    }

    public function librarians(): HasMany
    {
        return $this->hasMany('App\Models\Librarian','school_id','id');
    }

    public function parents(): HasMany
    {
        return $this->hasMany('App\Models\MyParent','school_id','id');
    }

    public function kitchens(): HasMany
    {
        return $this->hasMany('App\Models\Kitchen','school_id','id');
    }

    public function letters(): HasMany
    {
        return $this->hasMany('App\Models\Letter','school_id','id');
    }

    public function marks(): HasManyThrough
    {
        return $this->hasManyThrough(Mark::class,Exam::class,'school_id','exam_id','id');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany('App\Models\Attendance','school_id','id');
    }

    public function report_cards(): HasMany
    {
        return $this->hasMany('App\Models\ReportCard','school_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teachers','students','departments','clubs','streams')->get();
    }

    public function grades(): HasMany
    {
        return $this->hasMany('App\Models\Grade','school_id','id');
    }

    public function report_remarks(): HasMany
    {
        return $this->hasMany(ReportRemark::class,'school_id','id');
    }

    public function report_subject_grades(): HasMany
    {
        return $this->hasMany(ReportSubjectGrade::class,'school_id','id');
    }

    public function males(): int
    {
        return $this->hasManyThrough('App\Models\Student','App\Models\Stream','class_id','school_id','id')->where(['gender'=>'Male'])->count();
    }

    public function females(): int
    {
        return $this->hasManyThrough('App\Models\Student','App\Models\Stream','class_id','school_id','id')->where(['gender'=>'Female'])->count();
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class,'school_id','id');
    }
}
