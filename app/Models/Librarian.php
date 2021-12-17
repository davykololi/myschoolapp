<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\LibrarianResetPasswordNotification;

class Librarian extends Authenticatable implements Searchable
{
    use Notifiable;
    protected $guard = 'librarian';
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'librarians';
    protected $fillable = ['title','name','email','image','gender','id_no','emp_no','dob','designation','address','phone_no','history','bg_id','school_id','position_librarian_id','password'];
    protected $appends = ['age'];

    /**
    * The attributes that should be hidden for arrays.
    *
    *@var array
    */
    protected $hidden = ['password','remember_token',];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new LibrarianResetPasswordNotification($token));
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('superadmin.librarians.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function position_librarian()
    {
        return $this->belongsTo('App\Models\PositionLibrarian')->withDefault();
    }

    public function blood_group()
    {
        return $this->belongsTo('App\Models\BloodGroup')->withDefault();
    }

    public function libraries()
    {
        return $this->belongsToMany('App\Models\Library')->withTimestamps();
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
        return $query->with('school','position_librarian')->get();
    }
}
