<?php

namespace App\Models;

use App\Models\Mark;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';
    protected $fillable = ['grade','grade_no','points','from_mark','to_mark','school_id','year_id','term_id','exam_id','teacher_id','subject_id','class_id'];

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function class()
    {
    	return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function stream()
    {
    	return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function year()
    {
    	return $this->belongsTo('App\Models\Year')->withDefault();
    }

    public function exam()
    {
        return $this->belongsTo('App\Models\Exam')->withDefault();
    }

    public function term()
    {
        return $this->belongsTo('App\Models\Term')->withDefault();
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher')->withDefault();
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject')->withDefault();
    }

    public function scopeBetween($query)
    {
        return $query->whereBetween([$this->from_mark,$this->to_mark])->with('exam','class','year','term')->get();
    }
}
