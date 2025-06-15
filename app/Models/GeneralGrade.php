<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GeneralGrade extends Model
{
    use HasFactory;

    protected $table = 'general_grades';
    protected $fillable = ['grade','grade_no','points','from_mark','to_mark','year_id','term_id','exam_id','class_id'];

    public function class(): BelongsTo
    {
        return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo('App\Models\Year')->withDefault();
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo('App\Models\Exam')->withDefault();
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo('App\Models\Term')->withDefault();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('class','year','term','exam');
    }
}
