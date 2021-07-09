<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $table = 'attendances';
    protected $fillable = [
        'school_id'
        'stream_id',
        'teacher_id',
        'student_id',
        'attendence_date',
        'attendence_status'
    ];

    public function school()
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function teachers()
    {
    	return $this->hasMany('App\Models\Teacher','attendance_id','id');
    }

    public function rewards()
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }
}
