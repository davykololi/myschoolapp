<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportSubjectGrade extends Model
{
    use HasFactory;

    protected $table = 'report_subject_grades';
    protected $fillable = ['grade','grade_no','points','from_mark','to_mark','school_id','year_id','term_id','teacher_id','subject_id','class_id'];

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo('App\Models\MyClass')->withDefault();
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
}
