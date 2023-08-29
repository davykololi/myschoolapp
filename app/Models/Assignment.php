<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //
    protected $table = 'assignments';
    protected $fillable = ['name','date_given','deadline','file','school_id'];

    public function students()
    {
    	return $this->belongsToMany('App\Models\Student')->withTimestamps();
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher')->withTimestamps();
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function departments()
    {
        return $this->belongsToMany('App\Models\Department')->withTimestamps();
    }

    public function streams()
    {
        return $this->belongsToMany('App\Models\Stream')->withTimestamps();
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Models\Subject')->withTimestamps();
    }

    public function clubs()
    {
        return $this->belongsToMany('App\Models\Club')->withTimestamps();
    }

    public function dormitories()
    {
        return $this->belongsToMany('App\Models\Dormitory')->withTimestamps();
    }

    public function staffs()
    {
        return $this->belongsToMany('App\Models\Staff')->withTimestamps();
    }

    public function farms()
    {
        return $this->belongsToMany('App\Models\Farm')->withTimestamps();
    }

    public function fields()
    {
        return $this->belongsToMany('App\Models\Field')->withTimestamps();
    }

    public function halls()
    {
        return $this->belongsToMany('App\Models\Hall')->withTimestamps();
    }

    public function libraries()
    {
        return $this->belongsToMany('App\Models\Library')->withTimestamps();
    }

    public function kitchens()
    {
        return $this->belongsToMany('App\Models\Kitchen')->withTimestamps();
    }

    public function getDate()
    {
        $dateGiven = $this->date_given;
        return $dateGiven;
    }

    public function getDeadline()
    {
        $deadline = $this->deadline;
        return $deadline;
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','teachers','departments','subjects','streams')->latest()->get();
    }
}
