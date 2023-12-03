<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class ReportMeanGrade extends Model
{
    use HasFactory;

    protected $table = 'report_mean_grades';
    protected $fillable = ['grade','grade_id','points','from_mark','to_mark','year_id','term_id','class_id'];

    public function class(): BelongsTo
    {
        return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo('App\Models\Year')->withDefault();
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo('App\Models\Term')->withDefault();
    }
}
