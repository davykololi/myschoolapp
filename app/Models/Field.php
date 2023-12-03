<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Field extends Model implements Searchable
{
    //
    protected $table = 'fields';
    protected $fillable = ['name','type','code','school_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.fields.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function keinoField()
    {
        return $this->type === 'Kipchoge Keino Field';
    }

    public function kingswayField()
    {
        return $this->type === 'Kings Way Field';
    }

    public function hawksField()
    {
        return $this->type === 'Hawks Field';
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function assignments(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function rewards(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','category_field')->get();
    }
}
