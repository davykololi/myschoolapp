<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $table = 'records';
    protected $fillable = ['content','student_id','school_id','stream_id','department_id','teacher_id','staff_id','librarian_id','matron_id','accountant_id','admin_id','bog_id','class_id','parent_id','dormitory_id','intake_id','subject_id','event_id','standard_subject_id'];

    public function student(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Student')->withDefault();
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function stream(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function department(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Department')->withDefault();
    }

    public function teacher(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Teacher')->withDefault();
    }

    public function staff(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Staff')->withDefault();
    }

    public function librarian(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Librarian')->withDefault();
    }

    public function matron(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Matron')->withDefault();
    }

    public function accountant(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Accountant')->withDefault();
    }

    public function admin(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Admin')->withDefault();
    }

    public function bog(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Bog')->withDefault();
    }

    public function class(): BelongsTo
    {
    	return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function parent(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Parent')->withDefault();
    }

    public function dormitory(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Dormitory')->withDefault();
    }

    public function intake(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Intake')->withDefault();
    }

    public function subject(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Subject')->withDefault();
    }

    public function event(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Event')->withDefault();
    }

    public function stream_subject_teacher(): BelongsTo
    {
    	return $this->belongsTo('App\Models\StreamSubjectTeacher')->withDefault();
    }
}
