<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model implements Searchable
{
    //
    protected $table = 'rewards';
    protected $fillable = ['name','purpose','date','school_id','category_reward_id'];
    protected $casts = ['created_at' => 'datetime:d-m-Y'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.rewards.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function students()
    {
    	return $this->belongsToMany('App\Models\Student')->withTimestamps();
    }

    public function category_reward()
    {
        return $this->belongsTo('App\Models\CategoryReward')->withDefault();
    }

    public function teachers()
    {
    	return $this->belongsToMany('App\Models\Teacher')->withTimestamps();
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function staffs()
    {
        return $this->belongsToMany('App\Models\Staff')->withTimestamps();
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department')->withDefault();
    }

    public function streams()
    {
        return $this->belongsToMany('App\Models\Stream')->withTimestamps();
    }

    public function libraries()
    {
        return $this->belongsToMany('App\Models\Library')->withTimestamps();
    }

    public function attendances()
    {
        return $this->belongsToMany('App\Models\Attendance')->withTimestamps();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('students','category_reward','teachers','school','staffs','department','streams','libraries')->get();
    }
}
