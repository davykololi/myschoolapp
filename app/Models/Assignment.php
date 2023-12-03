<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //
    protected $table = 'assignments';
    protected $fillable = ['name','date_given','deadline','file','school_id'];

    public function students(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Student')->withTimestamps();
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Teacher')->withTimestamps();
    }

    public function school():BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Department')->withTimestamps();
    }

    public function streams(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Stream')->withTimestamps();
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Subject')->withTimestamps();
    }

    public function clubs(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Club')->withTimestamps();
    }

    public function dormitories(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Dormitory')->withTimestamps();
    }

    public function staffs(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Staff')->withTimestamps();
    }

    public function farms(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Farm')->withTimestamps();
    }

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Field')->withTimestamps();
    }

    public function halls(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Hall')->withTimestamps();
    }

    public function libraries(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Library')->withTimestamps();
    }

    public function kitchens(): BelongsToMany
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
