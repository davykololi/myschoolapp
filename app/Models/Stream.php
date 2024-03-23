<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\StandardSubject;
use App\Models\Book;
use App\Models\Student;
use App\Models\Syllabus;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model implements Searchable
{
    use HasFactory;
    protected $table = 'streams';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','code','stream_section_id','school_id','class_id'];
    protected $append = ['balances'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.streams.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function School(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function marks(): HasMany
    {
        return $this->hasMany('App\Models\Mark','stream_id','id');
    }

    public function stream_section(): BelongsTo
    {
        return $this->belongsTo('App\Models\StreamSection')->withDefault();
    }

    public function students(): HasMany
    {
    	return $this->hasMany('App\Models\Student','stream_id','id');
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Teacher')->withTimestamps();
    }

    public function exams(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }

    public function assignments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Subject')->withTimestamps();
    }

    public function stream_subjects(): HasMany
    {
        return $this->hasMany('App\Models\StreamSubject','stream_id','id');
    }

    public function stream_subjects_number(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Subject')->withTimestamps()->count();
    }

    public function intakes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Intake')->withTimestamps();
    }

    public function meetings(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function rewards(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function clubs(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Club')->withTimestamps();
    }

    public function games(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Game')->withTimestamps();
    }

    public function timetables(): HasMany
    {
        return $this->hasMany('App\Models\Timetable','stream_id','id');
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class,'stream_id','id');
    }

    public function notes(): HasMany
    {
        return $this->hasMany('App\Models\Note','stream_id','id');
    }

    public function syllabues(): HasMany
    {
        return $this->hasMany(Syllabus::class,'stream_id','id');
    }

    public function report_cards(): HasMany
    {
        return $this->hasMany('App\Models\ReportCard','stream_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teachers','students','school','class','stream_subjects','stream_section','timetables');
    }

    public function grades(): HasManyThrough
    {
        return $this->hasManyThrough('App\Models\Grade','App\Models\MyClass','stream_id','class_id','id');
    }

    public function males(): int
    {
        return $this->hasMany('App\Models\Student','stream_id','id')->where(['gender'=>'Male'])->count();
    }

    public function females(): int
    {
        return $this->hasMany('App\Models\Student','stream_id','id')->where(['gender'=>'Female'])->count();
    }
}
