<?php

namespace App\Models;

use Carbon\Carbon;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Club extends Model implements Searchable
{
    //
    protected $table = 'clubs';
    protected $fillable = ['name','code','reg_date','school_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.clubs.show', $this->id);

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

    public function streams()
    {
        return $this->belongsToMany('App\Models\Stream')->withTimestamps();
    }

    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function meetings()
    {
        return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function regDate()
    {
        $reg_date = $this->reg_date;
        $new_reg_date = Carbon::parse($reg_date)->format('d-m-Y');

        return $new_reg_date;
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','teachers','streams','staffs','students','assignments','meetings')->get();
    }
}
