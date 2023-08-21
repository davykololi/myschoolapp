<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $table = 'records';
    protected $fillable = ['content','student_id','school_id','stream_id','department_id','teacher_id','staff_id','librarian_id','matron_id','accountant_id','admin_id','bog_id','class_id','parent_id','dormitory_id','intake_id','subject_id','event_id','standard_subject_id'];

    public function student()
    {
    	return $this->belongsTo('App\Models\Student')->withDefault();
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function stream()
    {
    	return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department')->withDefault();
    }

    public function teacher()
    {
    	return $this->belongsTo('App\Models\Teacher')->withDefault();
    }

    public function staff()
    {
    	return $this->belongsTo('App\Models\Staff')->withDefault();
    }

    public function librarian()
    {
    	return $this->belongsTo('App\Models\Librarian')->withDefault();
    }

    public function matron()
    {
    	return $this->belongsTo('App\Models\Matron')->withDefault();
    }

    public function accountant()
    {
    	return $this->belongsTo('App\Models\Accountant')->withDefault();
    }

    public function admin()
    {
    	return $this->belongsTo('App\Models\Admin')->withDefault();
    }

    public function bog()
    {
    	return $this->belongsTo('App\Models\Bog')->withDefault();
    }

    public function class()
    {
    	return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function parent()
    {
    	return $this->belongsTo('App\Models\Parent')->withDefault();
    }

    public function dormitory()
    {
    	return $this->belongsTo('App\Models\Dormitory')->withDefault();
    }

    public function intake()
    {
    	return $this->belongsTo('App\Models\Intake')->withDefault();
    }

    public function subject()
    {
    	return $this->belongsTo('App\Models\Subject')->withDefault();
    }

    public function event()
    {
    	return $this->belongsTo('App\Models\Event')->withDefault();
    }

    public function standard_subject()
    {
    	return $this->belongsTo('App\Models\StandardSubject')->withDefault();
    }
}
