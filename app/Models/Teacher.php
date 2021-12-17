<?php

namespace App\Models;

use App\Models\StandardSubject;
use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\TeacherResetPasswordNotification;

class Teacher extends Authenticatable implements Searchable
{
    use Notifiable;
    protected $guard = 'teacher';
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'teachers';
    protected $fillable = ['title','name','email','image','gender','id_no','emp_no','dob','designation','address','phone_no','history','bg_id','school_id','position_teacher_id','password'];
    protected $appends = ['age'];

    /**
    * The attributes that should be hidden for arrays.
    *
    *@var array
    */
    protected $hidden = ['password','remember_token',];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new TeacherResetPasswordNotification($token));
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.teachers.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function students()
    {
    	return $this->belongsToMany('App\Models\Student')->withTimestamps();
    }

    public function timetables()
    {
        return $this->hasMany('App\Models\Timetable','teacher_id','id');
    }

    public function position_teacher()
    {
        return $this->belongsTo('App\Models\PositionTeacher')->withDefault();
    }

    public function blood_group()
    {
        return $this->belongsTo('App\Models\BloodGroup')->withDefault();
    }

    public function streams()
    {
    	return $this->belongsToMany('App\Models\Stream')->withTimestamps();
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function departments()
    {
        return $this->belongsToMany('App\Models\Department')->withTimestamps();
    }

    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Models\Subject')->withTimestamps();
    }

    public function meetings()
    {
        return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function rewards()
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function attendances()
    {
        return $this->belongsToMany('App\Models\Attendance')->withTimestamps();
    }

    public function clubs()
    {
        return $this->belongsToMany('App\Models\Club')->withTimestamps();
    }

    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin')->withDefault();
    }

    public function getAgeAttribute()       
    { 
        $myDate = $this->dob;
        $years = \Carbon\Carbon::parse($myDate)->age;

        return $years;     
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function standard_subject()
    {
        return $this->hasOne(StandardSubject::class,'teacher_id','id');
    }

    public function notes()
    {
        return $this->hasMany('App\Models\Note','teacher_id','id');
    }

    public function getDob()
    {
        $dob = $this->dob;
        $new_dob = date("jS,F,Y",strtotime($dob));

        return $new_dob;
    }

    public function marks()
    {
        return $this->hasMany('App\Models\Mark','teacher_id','id');
    }

    public function report_cards()
    {
        return $this->hasMany('App\Models\ReportCard','teacher_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('streams','school','students','position_teacher','departments')->get();
    }
}
