<?php

namespace App\Models;

use App\Models\ReportComment;
use App\Models\ReportSubjectGrade;
use App\Models\ReportGeneralGrade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $table = 'years';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['year','desc'];

    public function marks()
    {
        return $this->hasMany('App\Models\Mark','year_id','id');
    }

    public function exams()
    {
        return $this->hasMany('App\Models\Exam','year_id','id');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\Grade','year_id','id');
    }

    public function general_grades()
    {
        return $this->hasMany('App\Models\GeneralGrade','year_id','id');
    }

    public function report_subject_grades()
    {
        return $this->hasMany(ReportSubjectGrade::class,'year_id','id');
    }

    public function report_general_grades()
    {
        return $this->hasMany(ReportGeneralGrade::class,'year_id','id');
    }

    public function report_comments()
    {
        return $this->hasMany(ReportComment::class,'year_id','id');
    }

    public function payments()
    {
        return $this->hasMany('App\Models\Payment','year_id','id');
    }
}
