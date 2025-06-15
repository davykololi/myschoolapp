<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class DepartmentSection extends Model
{
    use HasFactory, HasUuids;
    
    protected $table = 'department_sections';
    protected $fillable = ['name','description','code','school_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function departments(): HasMany
    {
        return $this->hasMany('App\Models\Department','department_section_id','id');
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('departments','school');
    }
}
