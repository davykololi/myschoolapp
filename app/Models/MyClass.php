<?php

namespace App\Models;

use App\Models\ReportRemark;
use App\Models\ReportSubjectGrade;
use App\Models\ReportGeneralGrade;
use App\Enums\ClassInitialsEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class MyClass extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'classes';
    
    protected $fillable = ['name','initials','desc','slug','school_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    protected $casts = ['initials' => ClassInitialsEnum::class];

    protected $appends = ['number_of_subjects_per_class'];

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
        return $query->with('students','streams','school')->latest();
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

    public function studentsInfoLocked()
    {
        return $this->students()->where('lock','=','disabled')->exists();
    }

    public function studentsInfoUnlocked()
    {
        return $this->students()->where('lock','=','enabled')->exists();
    }

    public function name(): Attribute 
    {               
        return  new Attribute(                                                           
            set: fn ($value) => ucwords($value),                
        ); 
    }

    public function initials(): Attribute 
    {               
        return  new Attribute(                                                           
            set: fn ($value) => strtoupper($value),                
        ); 
    }

    public function getNumberOfSubjectsPerClassAttribute()
    {
        if(($this->initials === ClassInitialsEnum::FORM1) || ($this->initials === ClassInitialsEnum::FORM2)){
            return config('constants.form_one_and_two_subjects_number');
        }

        if(($this->initials === ClassInitialsEnum::FORM3) || ($this->initials === ClassInitialsEnum::FORM4)){
            return config('constants.form_three_and_four_subjects_number');
        }
    }

    public function streamsIds()
    {
        $streamsIds = $this->streams()->pluck('id')->toArray();
    }
}
