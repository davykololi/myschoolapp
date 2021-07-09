<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeSystem extends Model
{
    use HasFactory;

    protected $table = 'grade_systems';
    protected $fillable = ['grade','points','from_mark','to_mark','student_id','school_id','stream_id','department_id','teacher_id','staff_id','librarian_id','matron_id','accountant_id','admin_id','class_id','parent_id','dormitory_id','intake_id','subject_id','standard_subject_id'];

    public function students()
    {
    	return $this->belongsToMany('App\Models\Student')->withTimestamps();
    }
}
