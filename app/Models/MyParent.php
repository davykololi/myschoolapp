<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Facades\URL;
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
    protected $fillable = ['salutation','name','email','image','id_no','phone_no','school_id','password'];

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
                $this->name,
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

    public function children()
    {
        return $this->hasMany('App\Models\Student','parent_id','id');
    }

    public function getImageUrlAttribute()       
    { 
        return URL::asset('/storage/storage/'.$this->image);   
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','students');
    }
}
