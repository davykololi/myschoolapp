<?php

namespace App\Models;

use App\Models\Student;
use App\Models\School;
use App\Models\Department;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Admission;
use App\Models\Timetable;
use App\Models\Mark;
use App\Models\Term;
use App\Models\Year;
use App\Models\Grade;
use App\Models\GeneralGrade;
use App\Models\ReportRemark;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Exam extends Model implements Searchable
{
    //
    use HasUuids;
    protected $table = 'exams';
    protected $fillable = ['name','initials','code','type','start_date','end_date','status','results_published','school_id','year_id','term_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.exams.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function midTermExam()
    {
        return $this->type === 'Mid Term Enaminations';
    }

    public function endTermExam()
    {
        return $this->type === 'End Term Enaminations';
    }

    public function mockExam()
    {
        return $this->type === 'Mock Enaminations';
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo(School::class)->withDefault();
    }

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class)->withTimestamps();
    }

    public function streams(): BelongsToMany
    {
        return $this->belongsToMany(Stream::class)->withTimestamps();
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class)->withTimestamps();
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class)->withTimestamps();
    }

    public function timetables(): HasMany
    {
        return $this->hasMany(Timetable::class,'exam_id','id');
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class)->withDefault();
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class)->withDefault();
    }

    public function marks(): HasMany
    {
        return $this->hasMany(Mark::class,'exam_id','id');
    }

    public function examYear()
    {
        $year = \App\Models\Exam::select('updated_at')->first();
        return \Carbon\Carbon::parse($year->updated_at,'year');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teachers','students','school','streams','year','term','marks','grades','general_grades','subjects');
    }

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class,'exam_id','id');
    }

    public function general_grades(): HasMany
    {
        return $this->hasMany(GeneralGrade::class,'exam_id','id');
    }

    public function report_general_grades(): HasMany
    {
        return $this->hasMany('App\Models\ReportGeneralGrade','exam_id','id');
    }

    public function name(): Attribute 
    {               
        return  new Attribute(                                                           
            get: fn ($value) => ucwords($value),                
        ); 
    }

    public function initials(): Attribute 
    {               
        return  new Attribute(                                                           
            get: fn ($value) => strtoupper($value),                
        ); 
    }
}
