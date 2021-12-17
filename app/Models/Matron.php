<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\MatronResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Matron extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $guard = 'matron';

    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'matrons';
    protected $fillable = ['title','name','email','image','gender','id_no','emp_no','dob','designation','address','phone_no','history','bg_id','school_id','position_matron_id','password'];
    protected $appends = ['age'];
    /**
    * The attributes that should be hidden for arrays.
    *
    *@var array
    */
    protected $hidden = ['password','remember_token',];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MatronResetPasswordNotification($token));
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function position_matron()
    {
        return $this->belongsTo('App\Models\PositionMatron')->withDefault();
    }

    public function blood_group()
    {
        return $this->belongsTo('App\Models\BloodGroup')->withDefault();
    }

    public function meetings()
    {
    	return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function rewards()
    {
    	return $this->belongsToMany('App\Models\Reward')->withTimestamps();
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

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','position_matron','meetings','rewards')->get();
    }
}
