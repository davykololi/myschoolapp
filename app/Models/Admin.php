<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;
    //
    protected $guard = 'admin';

    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'admins';
    protected $fillable = ['first_name','middle_name','last_name','title','email','image','id_no','emp_no','dob','designation','postal_address','phone_no','history','school_id','superadmin_id','password'];
    protected $appends = ['full_name','age'];
    protected $casts = ['created_at' => 'datetime:d-m-Y H:i'];

    /**
    * The attributes that should be hidden for arrays.
    *
    *@var array
    */
    protected $hidden = ['password','remember_token',];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function superadmin()
    {
    	return $this->belongsTo('App\Models\Superadmin')->withDefault();
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student','admin_id','id');
    }

    public function teachers()
    {
        return $this->hasMany('App\Models\Teacher','admin_id','id');
    }

    public function staffs()
    {
        return $this->hasMany('App\Models\Staff','admin_id','id');
    }

    public function getFullNameAttribute()       
    {        
    return $this->first_name . " " . $this->middle_name ." ". $this->last_name;       
    }

    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
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
