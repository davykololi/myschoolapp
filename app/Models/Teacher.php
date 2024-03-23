<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Str;
use App\Models\ReportSubjectGrade;
use App\Enums\TeacherPositionEnum;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notifiable;
use	Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\CommonUserInformation;

class Teacher extends CommonUserInformation implements Searchable
{
    use Notifiable;
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'teachers';
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime','created_at' => 'datetime:d-m-Y H:i','position'=> TeacherPositionEnum::class];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.teachers.show', $this->id);

        return new SearchResult(
                $this,
                $this->full_name,
                $url
            );
    }

    public function students(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Student')->withTimestamps();
    }

    public function timetables(): HasMany
    {
        return $this->hasMany('App\Models\Timetable','teacher_id','id');
    }

    /**
     * @return BelongsToMany
     */
    public function streams(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Stream')->withTimestamps();
    }

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Department')->withTimestamps();
    }

    public function assignments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Subject')->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'teacher_id', 'id');
    }

    public function clubs(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Club')->withTimestamps();
    }

    public function exams(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin')->withDefault();
    }

    public function stream_subjects(): HasMany
    {
        return $this->hasMany('App\Models\StreamSubject','teacher_id','id');
    }

    public function notes(): HasMany
    {
        return $this->hasMany('App\Models\Note','teacher_id','id');
    }

    public function getDateFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F d, Y');
    }

    public function getExcerptAttribute()
    {
        return substr(strip_tags($this->history), 0, 100);
    }

    public function getDob()
    {
        $dob = $this->dob;
        return $dob;
    }

    public function marks(): HasMany
    {
        return $this->hasMany('App\Models\Mark','teacher_id','id');
    }

    public function report_cards(): HasMany
    {
        return $this->hasMany('App\Models\ReportCard','teacher_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('streams','students','departments','user');
    }

    public function grades(): HasMany
    {
        return $this->hasMany('App\Models\GradeSystem','teacher_id','id');
    }

    public function classTeacher()
    {
        return $this->position === TeacherPositionEnum::CT;
    }

    public function headTeacher()
    {
        return $this->position === TeacherPositionEnum::HT;
    }

    public function deputyHeadTeacher()
    {
        return $this->position === TeacherPositionEnum::DHT;
    }

    public function headScienceDept()
    {
        return $this->position === TeacherPositionEnum::HSD;
    }

    public function assistantHeadScinceDept()
    {
        return $this->position === TeacherPositionEnum::AHSD;
    }

    public function headHumanityDept()
    {
        return $this->position === TeacherPositionEnum::HHD;
    }

    public function assistantHeadHumanityDept()
    {
        return $this->position === TeacherPositionEnum::AHHD;
    }

    public function headMathsDept()
    {
        return $this->position === TeacherPositionEnum::HMD;
    }

    public function assistantHeadMathsDept()
    {
        return $this->position === TeacherPositionEnum::AHMD;
    }

    public function headLanguagesDept()
    {
        return $this->position === TeacherPositionEnum::HLD;
    }

    public function assistantHeadLanguagesDept()
    {
        return $this->position === TeacherPositionEnum::AHLD;
    }

    public function staffTeacher()
    {
        return $this->position === TeacherPositionEnum::ST;
    }

    public function report_subject_grades(): HasMany
    {
        return $this->hasMany(ReportSubjectGrade::class,'teacher_id','id');
    }
}
