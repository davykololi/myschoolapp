<?php

namespace App\Models;

use Auth;
use App\Models\Exam;
use App\Models\Student;
use App\Models\School;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\StandardSubject;
use App\Models\MyClass;
use App\Models\Stream;
use App\Models\Grade;
use App\Models\Year;
use App\Models\Term;
use HiFolks\Statistics\Stat;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $table = 'marks';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','admission_no','exam_no','mathematics','english','kiswahili','chemistry','biology','physics','cre','islam','history','geography','class_id','stream_id','exam_id','student_id','school_id','teacher_id','term_id','year_id'];
    protected $appends = ['total','student_minscore'];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class)->withDefault();
    }

    public function standard_subject(): BelongsTo
    {
    	return $this->belongsTo(StandardSubject::class)->withDefault();
    }

     public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class)->withDefault();
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class)->withDefault();
    }

    public function exam(): BelongsTo
    {
    	return $this->belongsTo(Exam::class)->withDefault();
    }

    public function student(): BelongsTo
    {
    	return $this->belongsTo(Student::class)->withDefault();
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo(School::class)->withDefault();
    }

    public function teacher(): BelongsTo
    {
    	return $this->belongsTo(Teacher::class)->withDefault();
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(MyClass::class)->withDefault();
    }

    public function stream(): BelongsTo
    {
        return $this->belongsTo(Stream::class)->withDefault();
    }

    public function getTotalAttribute()
    {
        $math = $this->mathematics;
        $eng = $this->english;
        $kis = $this->kiswahili;
        $chem = $this->chemistry;
        $bio = $this->biology;
        $phy = $this->physics;
        $cre = $this->cre;
        $is = $this->islam;
        $hist = $this->history;
        $geography = $this->geography;

        return  collect([$math,$eng,$kis,$chem,$bio,$phy,$cre,$is,$hist,$geography])->sum();
    }

    public function getStudentMinscoreAttribute()
    {
        $math = $this->mathematics;
        $eng = $this->english;
        $kis = $this->kiswahili;
        $chem = $this->chemistry;
        $bio = $this->biology;
        $phy = $this->physics;
        $cre = $this->cre;
        $is = $this->islam;
        $hist = $this->history;
        $geography = $this->geography;

        $sum = collect([$math,$eng,$kis,$chem,$bio,$phy,$cre,$is,$hist,$geography])->sum();

        return  round($sum/5,1);
    }

    public function getExamGradesAttribute()
    {
        $examGrades = $this->grades->where(['year_id'=>$this->year_id,'term_id'=>$this->term_id,'exam_id'=>$this->exam_id,'class_id'=>$this->class_id,'stream_id'=>$this->stream_id])->get();

        foreach($examGrades as $gr){
            if($gr->subject->name === $this->subject->id){
                return $gr->name;
            }
        } 
    }

    public function outOf()
    {
        return '/500';
    }
}
