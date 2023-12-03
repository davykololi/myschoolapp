<?php

namespace App\Models;

use App\Models\ReportRemark;
use App\Models\ReportSubjectGrade;
use App\Models\ReportGeneralGrade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Year extends Model
{
    use HasFactory;
    protected $table = 'years';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['year','desc'];

    public function marks(): HasMany
    {
        return $this->hasMany('App\Models\Mark','year_id','id');
    }

    public function exams(): HasMany
    {
        return $this->hasMany('App\Models\Exam','year_id','id');
    }

    public function grades(): HasMany
    {
        return $this->hasMany('App\Models\Grade','year_id','id');
    }

    public function general_grades(): HasMany
    {
        return $this->hasMany('App\Models\GeneralGrade','year_id','id');
    }

    public function report_subject_grades(): HasMany
    {
        return $this->hasMany(ReportSubjectGrade::class,'year_id','id');
    }

    public function report_general_grades(): HasMany
    {
        return $this->hasMany(ReportGeneralGrade::class,'year_id','id');
    }

    public function report_remarks(): HasMany
    {
        return $this->hasMany(ReportRemark::class,'year_id','id');
    }

    public function payments(): HasMan
    {
        return $this->hasMany('App\Models\Payment','year_id','id');
    }
}
