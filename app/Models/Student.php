<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Mark;
use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\StudentResetPasswordNotification;

class Student extends Authenticatable implements Searchable
{
    use HasFactory;
    use Notifiable;
    protected $guard = 'student';
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'students';
    protected $fillable = ['title','name','adm_mark','image','gender','phone_no','admission_no','dob','doa','email','address','history','bg_id','school_id','stream_id','intake_id','dormitory_id','admin_id','parent_id','position_student_id','password'];
    protected $appends = ['age'];

    /**
    * The attributes that should be hidden for arrays.
    *
    *@var array
    */
    protected $hidden = ['password','remember_token',];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StudentResetPasswordNotification($token));
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.students.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function intake()
    {
    	return $this->belongsTo('App\Models\Intake')->withDefault();
    }

    public function position_student()
    {
        return $this->belongsTo('App\Models\PositionStudent')->withDefault();
    }

    public function blood_group()
    {
        return $this->belongsTo('App\Models\BloodGroup')->withDefault();
    }

    public function teachers()
    {
    	return $this->belongsToMany('App\Models\Teacher')->withTimestamps();
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function exams()
    {
    	return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }

    public function class()
    {
    	return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function stream()
    {
        return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Models\Subject')->withTimestamps();
    }

    public function dormitory()
    {
        return $this->belongsTo('App\Models\Dormitory')->withDefault();
    }

    public function libraries()
    {
        return $this->belongsToMany('App\Models\Library')->withTimestamps();
    }

    public function fee()
    {
        return $this->hasOne('App\Models\Fee','student_id','id');
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

    public function halls()
    {
        return $this->belongsToMany('App\Models\Hall')->withTimestamps();
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin')->withDefault();
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\MyParent')->withDefault();
    }

    public function issued_books()
    {
        return $this->hasMany('App\Models\IssuedBook','student_id','id');
    }

    public function records()
    {
        return $this->hasMany('App\Models\Record','student_id','id');
    }

    public function getAgeAttribute()       
    { 
    	$myDate = $this->attributes['dob'];
    	$years = \Carbon\Carbon::parse($myDate)->age;

        return $years;     
    }

    public function setNameAttribute($value)
    {
    	$this->attributes['name'] = ucfirst($value);
    }

    public function getDob()
    {
        $dob = $this->dob;
        $new_dob = date("jS,F,Y",strtotime($dob));

        return $new_dob;
    }

    public function getDoa()
    {
        $doa = $this->doa;
        $new_doa = date("jS,F,Y",strtotime($doa));

        return $new_doa;
    }

    public function marks()
    {
        return $this->hasMany(Mark::class,'student_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','libraries','teachers','class','stream','clubs','parent')->get();
    }
}
