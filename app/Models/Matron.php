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
    protected $fillable = ['title','first_name','middle_name','last_name','email','image','id_no','emp_no','dob','designation','current_address','permanent_address','phone_no','history','school_id','position_matron_id','password'];
    protected $appends = ['full_name','age'];

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

    public function meetings()
    {
    	return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function rewards()
    {
    	return $this->belongsToMany('App\Models\Reward')->withTimestamps();
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
}
