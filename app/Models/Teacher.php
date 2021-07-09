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
    //
    protected $guard = 'teacher';

    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'teachers';
    protected $fillable = ['first_name','middle_name','last_name','title','email','image','id_no','emp_no','dob','designation','postal_address','phone_no','history','school_id','position_teacher_id','password'];
    protected $appends = ['full_name','age'];

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
                $this->full_name,
                $url
            );
    }

    public function students()
    {
    	return $this->belongsToMany('App\Models\Student')->withTimestamps();
    }

    public function position_teacher()
    {
        return $this->belongsTo('App\Models\PositionTeacher')->withDefault();
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

    public function getFullNameAttribute()       
    {        
    return $this->first_name . " " . $this->middle_name ." ". $this->last_name;       
    }

    public function getAgeAttribute()       
    { 
        $myDate = $this->dob;
        $years = \Carbon\Carbon::parse($myDate)->age;

        return $years;     
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }

    public function setMiddleNameAttribute($value)
    {
        $this->attributes['middle_name'] = ucfirst($value);
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst($value);
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
}
