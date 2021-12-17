<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Student;
use App\Models\School;
use App\Models\Teacher;
use App\Models\StandardSubject;
use App\Models\MyClass;
use App\Models\Stream;
use App\Models\Year;
use App\Models\Term;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $table = 'marks';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','index_no','mathematics','english','kiswahili','chemistry','biology','physics','cre','islam','history','ghc','class_id','stream_id','exam_id','school_id','teacher_id','term_id','year_id'];
    protected $appends = ['total'];

    public function standard_subject()
    {
    	return $this->belongsTo(StandardSubject::class)->withDefault();
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

    public function student()
    {
    	return $this->belongsTo(Student::class)->withDefault();
    }

    public function school()
    {
    	return $this->belongsTo(School::class)->withDefault();
    }

    public function teacher()
    {
    	return $this->belongsTo(Teacher::class)->withDefault();
    }

    public function class()
    {
        return $this->belongsTo(MyClass::class)->withDefault();
    }

    public function stream()
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
        $ghc = $this->ghc;

        return  collect([$math,$eng,$kis,$chem,$bio,$phy,$cre,$is,$hist,$ghc])->sum();
    }
}
