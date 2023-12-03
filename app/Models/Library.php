<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Library extends Model implements Searchable
{
    //
    protected $table = 'libraries';
    protected $fillable = ['name','code','phone_no','lib_head','lib_asshead','school_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.libraries.show', $this->id);

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

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function meetings(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function rewards(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function books(): HasMany
    {
        return $this->hasMany('App\Models\Book','library_id');
    }

    public function librarians(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Librarian')->withTimestamps();
    }

    public function assignments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('meetings','rewards','books','librarians','school','students')->get();
    }
}
