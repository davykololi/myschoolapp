<?php

namespace App\Models;

use App\Models\School;
use App\Models\Term;
use App\Models\Year;
use App\Models\Exam;
use App\Models\MyClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportComment extends Model
{
    use HasFactory;

    protected $table = 'report_comments';
    protected $fillable = ['comment','comment_no','from_total','to_total','class_id','exam_id','school_id','year_id','term_id'];

    public function school()
    {
        return $this->belongsTo(School::class)->withDefault();
    }

    public function year()
    {
        return $this->belongsTo(Year::class)->withDefault();
    }

    public function term()
    {
        return $this->belongsTo(Term::class)->withDefault();
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class)->withDefault();
    }

    public function class()
    {
        return $this->belongsTo(MyClass::class)->withDefault();
    }
}
