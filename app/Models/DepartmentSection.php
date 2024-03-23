<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentSection extends Model
{
    use HasFactory;
    protected $table = 'department_sections';
    protected $fillable = ['name','description','code','school_id'];

    public function departments(): HasMany
    {
        return $this->hasMany('App\Models\Department','dept_section_id','id');
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
