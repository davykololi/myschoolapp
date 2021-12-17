<?php

namespace App\Models;

use App\Models\Student;
use App\Models\CategorySubject;
use App\Models\Teacher;
use App\Models\School;
use App\Models\Exam;
use App\Models\Department;
use App\Models\Stream;
use App\Models\Assignment;
use App\Models\Reward;
use App\Models\StandardSubject;
use App\Models\Note;
use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model implements Searchable
{
    //
    protected $table = 'subjects';
    protected $fillable = ['name','code','department_id','school_id','category_subject_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.subjects.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function category_subject()
    {
        return $this->belongsTo(CategorySubject::class)->withDefault();
    }

    public function students()
    {
    	return $this->belongsToMany(Student::class)->withTimestamps();
    }

    public function teachers()
    {
    	return $this->belongsToMany(Teacher::class)->withTimestamps();
    }

    public function school()
    {
        return $this->belongsTo(School::class)->withDefault();
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class)->withTimestamps();
    }

    public function department()
    {
        return $this->belongsTo(Department::class)->withDefault();
    }

    public function streams()
    {
        return $this->belongsToMany(Stream::class)->withTimestamps();
    }

    public function assignments()
    {
        return $this->belongsToMany(Assignment::class)->withTimestamps();
    }

    public function rewards()
    {
        return $this->belongsToMany(Reward::class)->withTimestamps();
    }

    public function standard_subjects()
    {
        return $this->hasMany(StandardSubject::class,'subject_id','id');
    }

    public function notes()
    {
        return $this->hasManyThrough(Note::class,StandardSubject::class,'subject_id','standard_subject_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teachers','students','school','department','category_subject')->latest()->get();
    }
}
