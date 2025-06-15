<?php

namespace App\Models;

use App\Models\ReportRemark;
use App\Models\ReportSubjectGrade;
use App\Models\ReportGeneralGrade;
use as\Models\SubjectRemark;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Year extends Model
{
    use HasFactory, HasUuids;
    
    protected $table = 'years';
    
    protected $fillable = ['year','desc'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

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

    public function scopeEagerLoaded($query)
    {
        return $query->with('marks','exams','grades','general_grades','report_subject_grades','report_general_grades','report_remarks','payments');
    }

    public function subject_remarks(): HasMany
    {
        return $this->hasMany(SubjectRemark::class,'year_id','id');
    }
}
