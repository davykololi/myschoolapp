<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'admins';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['title','name','email','image','gender','id_no','emp_no','dob','designation','address','phone_no','history','school_id','superadmin_id','password'];
    protected $appends = ['age'];
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

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('superadmin','school','staffs','students')->get();
    }
}
