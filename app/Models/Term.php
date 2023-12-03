<?php

namespace App\Models;

use App\Models\ReportRemark;
use App\Models\ReportSubjectGrade;
use App\Models\ReportGeneralGrade;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Term extends Model
{
    use HasFactory;
    protected $table = 'terms';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','code','status','school_id'];

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function marks(): HasMany
    {
        return $this->hasMany('App\Models\Mark','term_id','id');
    }

    public function exams(): HasMany
    {
        return $this->hasMany('App\Models\Exam','term_id','id');
    }

    public function grades(): HasMany
    {
        return $this->hasMany('App\Models\Grade','term_id','id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany('App\Models\Payment','term_id','id');
    }

    public function general_grades(): HasMany
    {
        return $this->hasMany('App\Models\GeneralGrade','term_id','id');
    }

    public function report_subject_grades(): HasMany
    {
        return $this->hasMany(ReportSubjectGrade::class,'term_id','id');
    }

    public function report_general_grades(): HasMany
    {
        return $this->hasMany(ReportGeneralGrade::class,'term_id','id');
    }

    public function report_remarks()
    {
        return $this->hasMany(ReportRemark::class,'term_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school')->get();
    }
}
