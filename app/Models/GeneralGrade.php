<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralGrade extends Model
{
    use HasFactory;

    protected $table = 'general_grades';
    protected $fillable = ['grade','grade_no','points','from_mark','to_mark','year_id','term_id','exam_id','class_id'];

    public function class()
    {
        return $this->belongsTo('App\Models\MyClass')->withDefault();
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
}
