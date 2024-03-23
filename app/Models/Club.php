<?php

namespace App\Models;

use Carbon\Carbon;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function students(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Student')->withTimestamps();
    }

    public function teachers(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Teacher')->withTimestamps();
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function subordinates(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Subordinate')->withTimestamps();
    }

    public function streams(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Stream')->withTimestamps();
    }

    public function assignments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function meetings(): BelongsToMany
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
        return $query->with('school','teachers','streams','subordinates','students','assignments','meetings')->get();
    }
}
