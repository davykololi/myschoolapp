<?php

namespace App\Models;

use App\Models\School;
use App\Models\Term;
use App\Models\Year;
use App\Models\Exam;
use App\Models\MyClass;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportRemark extends Model
{
    use HasFactory;

    protected $table = 'report_remarks';
    protected $fillable = ['remark','remark_id','from_total','to_total','class_id','school_id','year_id','term_id'];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class)->withDefault();
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class)->withDefault();
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class)->withDefault();
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(MyClass::class)->withDefault();
    }
}
