<?php

namespace App\Models;

use App\Models\ReportComment;
use App\Models\ReportSubjectGrade;
use App\Models\ReportGeneralGrade;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    protected $table = 'terms';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','code','status','school_id'];

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function marks()
    {
        return $this->hasMany('App\Models\Mark','term_id','id');
    }

    public function exams()
    {
        return $this->hasMany('App\Models\Exam','term_id','id');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\Grade','term_id','id');
    }

    public function payments()
    {
        return $this->hasMany('App\Models\Payment','term_id','id');
    }

    public function general_grades()
    {
        return $this->hasMany('App\Models\GeneralGrade','term_id','id');
    }

    public function report_subject_grades()
    {
        return $this->hasMany(ReportSubjectGrade::class,'term_id','id');
    }

    public function report_general_grades()
    {
        return $this->hasMany(ReportGeneralGrade::class,'term_id','id');
    }

    public function report_comments()
    {
        return $this->hasMany(ReportComment::class,'term_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school')->get();
    }
}
