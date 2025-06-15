<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Library extends Model implements Searchable
{
    //
    use HasUuids;
    
    protected $table = 'libraries';
    protected $fillable = ['name','code','phone_no','lib_head','lib_asshead','school_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

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

    public function library_numbers(): HasMany
    {
        return $this->hasMany('App\Models\LibraryNumber','library_id','id');
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function meetings(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function awards(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Award')->withTimestamps();
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
        return $query->with('meetings','awards','books','librarians','school','students')->latest();
    }
}
