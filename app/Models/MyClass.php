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
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class MyClass extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','desc','slug','school_id'];

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function marks(): HasMany
    {
        return $this->hasMany('App\Models\Mark','class_id','id');
    }

    public function streams(): HasMany
    {
        return $this->hasMany('App\Models\Stream','class_id','id');
    }

    public function timetables(): HasMany
    {
        return $this->hasMany('App\Models\Timetable','class_id','id');
    }

    public function notes(): HasManyThrough
    {
        return $this->hasManyThrough('App\Models\Note','App\Models\Stream','class_id','stream_id','id');
    }

    public function students(): HasManyThrough
    {
        return $this->hasManyThrough('App\Models\Student','App\Models\Stream','class_id','stream_id','id');
    }

    public function report_cards(): HasMany
    {
        return $this->hasMany('App\Models\ReportCard','class_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('students','streams','school')->get();
    }

    public function grades(): HasMany
    {
        return $this->hasMany('App\Models\Grade','class_id','id');
    }

    public function general_grades(): HasMany
    {
        return $this->hasMany('App\Models\GeneralGrade','class_id','id');
    }

    public function report_subject_grades(): HasMany
    {
        return $this->hasMany(ReportSubjectGrade::class,'class_id','id');
    }

    public function report_general_grades(): HasMany
    {
        return $this->hasMany(ReportGeneralGrade::class,'class_id','id');
    }

    public function report_remarks(): HasMany
    {
        return $this->hasMany(ReportRemark::class,'class_id','id');
    }

    public function males(): int
    {
        return $this->hasManyThrough('App\Models\Student','App\Models\Stream','class_id','stream_id')->where(['gender'=>'Male'])->count();
    }

    public function females(): int
    {
        return $this->hasManyThrough('App\Models\Student','App\Models\Stream','class_id','stream_id')->where(['gender'=>'Female'])->count();
    }
}
