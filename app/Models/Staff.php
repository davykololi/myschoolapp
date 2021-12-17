<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\StaffResetPasswordNotification;

class Staff extends Authenticatable implements Searchable
{
    use Notifiable;
    protected $guard = 'staff';
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'staffs';
    protected $fillable = ['title','name','image','gender','email','emp_no','id_no','dob','designation','address','phone_no','history','bg_id','school_id','position_staff_id','password','admin_id'];
    protected $appends = ['age'];

    /**
    * The attributes that should be hidden for arrays.
    *
    *@var array
    */
    protected $hidden = ['password','remember_token',];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StaffResetPasswordNotification($token));
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.staffs.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url,
            );
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function position_staff()
    {
        return $this->belongsTo('App\Models\PositionStaff')->withDefault();
    }

    public function blood_group()
    {
        return $this->belongsTo('App\Models\BloodGroup')->withDefault();
    }

    public function departments()
    {
    	return $this->belongsToMany('App\Models\Department')->withTimestamps();
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

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin')->withDefault();
    }

    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
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
        return $query->with('school','position_staff','departments','meetings','rewards','clubs','assignments','admin')->get();
    }
}
