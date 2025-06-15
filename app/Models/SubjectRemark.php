<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class SubjectRemark extends Model
{
    protected $table = 'subject_remarks';
    protected $fillable = ['remark','remark_id','from_mark','to_mark','school_id','year_id','term_id','teacher_id','subject_id','stream_id'];

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function stream(): BelongsTo
    {
        return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo('App\Models\Year')->withDefault();
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo('App\Models\Term')->withDefault();
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo('App\Models\Subject')->withDefault();
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo('App\Models\Teacher')->withDefault();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('stream','term','year','teacher','subject');
    }
}
