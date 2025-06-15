<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Attendance extends Model
{
    //
    use HasUuids;
    
    protected $table = 'attendances';
    protected $fillable = [
        'date',
        'time',
        'school_id',
        'stream_id',
        'teacher_id',
        'student_id',
        'attendence_status',
    ];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    /**
     * @return BelongsToMany
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'attendance_student', 'attendance_id','student_id')->withPivot('status');
    }

    /**
     * @return BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    /**
     * @return BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    //scopes --------------------------------------------------
    public function scopeWhereSubject($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('subject_id', "$search");
        });
    }// end of scopeWhenSearch

    //scopes --------------------------------------------------
    public function scopeWhereDateIs($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('date', Carbon::parse($search)->format('Y-m-d'));
        });
    }// end of scopeWhenSearch
}
