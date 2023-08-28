<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\School;
use App\Models\Exam;
use App\Models\Department;
use App\Models\Stream;
use App\Models\Assignment;
use App\Models\Reward;
use App\Models\Note;
use App\Models\Grade;
use App\Models\Record;
use App\Models\ReportGeneralGrade;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model implements Searchable
{
    //
    protected $table = 'subjects';
    protected $fillable = ['name','type','code','department_id','school_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.subjects.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function sciences()
    {
        return $this->type === 'Sciences' && Department::whereName('Science Department')->frist();
    }

    public function humanities()
    {
        return $this->type === 'Humanities' && Department::whereName('Humanities Department')->frist();
    }

    public function mathematics()
    {
        return $this->type === 'Mathematics' && Department::whereName('Mathematics Department')->frist();
    }

    /**
     * @return BelongsToMany
     */
    public function students(): BelongsToMany
    {
    	return $this->belongsToMany(Student::class)->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function teachers(): BelongsToMany
    {
    	return $this->belongsToMany(Teacher::class)->withTimestamps();
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class)->withDefault();
    }

    public function exams(): BelongsToMany
    {
        return $this->belongsToMany(Exam::class)->withTimestamps();
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class)->withDefault();
    }

    public function streams(): BelongsToMany
    {
        return $this->belongsToMany(Stream::class)->withTimestamps();
    }

    public function assignments(): BelongsToMany
    {
        return $this->belongsToMany(Assignment::class)->withTimestamps();
    }

    public function rewards(): BelongsToMany
    {
        return $this->belongsToMany(Reward::class)->withTimestamps();
    }

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class,'subject_id','id');
    }

    public function report_general_grades(): HasMany
    {
        return $this->hasMany(ReportGeneralGrade::class,'subject_id','id');
    }

    public function marks(): HasManyThrough
    {
        return $this->hasManyThrough(Mark::class,StandardSubject::class,'subject_id','standard_subject_id','id');
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class,'subject_id','id');
    }

    public function stream_subjects(): HasMany
    {
        return $this->hasMany(StreamSubjectTeacher::class,'subject_id','id');
    }

    public function records(): HasMany
    {
        return $this->hasMany(Record::class,'subject_id','id');
    }

    /**
     * @return HasMany
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class,'subject_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teachers','students','school','department','stream_subjects')->latest()->get();
    }
}
