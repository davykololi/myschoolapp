<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\ParentResetPasswordNotification;

class MyParent extends Authenticatable implements Searchable
{
    use HasFactory, Notifiable;
    //
    protected $guard = 'parent';

    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'parents';
    protected $fillable = ['title','first_name','middle_name','last_name','email','image','id_no','emp_no','dob','designation','current_address','permanent_address','phone_no','school_id','password'];
    protected $appends = ['full_name','age'];

    /**
    * The attributes that should be hidden for arrays.
    *
    *@var array
    */
    protected $hidden = ['password','remember_token',];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ParentResetPasswordNotification($token));
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.parents.show', $this->id);

        return new SearchResult(
                $this,
                $this->full_name,
                $url
            );
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function meetings()
    {
    	return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function rewards()
    {
    	return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student','parent_id','id');
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
