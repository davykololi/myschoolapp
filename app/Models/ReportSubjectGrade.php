<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportSubjectGrade extends Model
{
    use HasFactory;

    protected $table = 'report_subject_grades';
    protected $fillable = ['grade','grade_no','points','from_mark','to_mark','school_id','year_id','term_id','teacher_id','subject_id','class_id'];

    public function school()
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function class()
    {
        return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function year()
    {
        return $this->belongsTo('App\Models\Year')->withDefault();
    }

    public function term()
    {
        return $this->belongsTo('App\Models\Term')->withDefault();
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject')->withDefault();
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher')->withDefault();
    }
}
