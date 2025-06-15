<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Department extends Model implements Searchable
{
    //
    use HasUuids;
    
    protected $table = 'departments';
    protected $fillable = ['name','code','phone_no','head_name','asshead_name','motto','vision','mission','department_section_id','school_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.departments.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function teachers(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Teacher')->withTimestamps();
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function department_section(): BelongsTo
    {
        return $this->belongsTo('App\Models\DepartmentSection')->withDefault();
    }

    public function subordinates(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Subordinate')->withTimestamps();
    }

    public function exams(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }

    public function assignments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function subjects(): HasMany
    {
        return $this->hasMany('App\Models\Subject','department_id','id');
    }

    public function meetings(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function awards(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Award')->withTimestamps();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teachers','school','subordinates','exams','assignments','subjects','meetings','department_section');
    }
}
