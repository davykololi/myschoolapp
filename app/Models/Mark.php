<?php

namespace App\Models;

use Auth;
use App\Models\Exam;
use App\Models\Student;
use App\Models\School;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\StreamSubject;
use App\Models\MyClass;
use App\Models\Stream;
use App\Models\Grade;
use App\Models\Year;
use App\Models\Term;
use App\Enums\ClassInitialsEnum;
use HiFolks\Statistics\Stat;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    
    protected $table = 'marks';

    protected $fillable = ['name','admission_no','exam_no','mathematics','english','kiswahili','chemistry','biology','physics','cre','islam','history_and_government','geography','home_science','art_and_design','agriculture','business_studies','computer_studies','drawing_and_design','french','german','arabic','sign_language','music','wood_work','metal_work','building_construction','power_mechanics','electricity','aviation_technology','class_id','stream_id','exam_id','student_id','school_id','teacher_id','term_id','year_id'];
    protected $appends = ['total','student_minscore','out_of'];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class)->withDefault();
    }

    public function stream_subject(): BelongsTo
    {
    	return $this->belongsTo(StreamSubject::class)->withDefault();
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
        $histAndGovernment = $this->history_and_government;
        $geography = $this->geography;
        $homeScience = $this->home_science;
        $artAndDesign = $this->art_and_design;
        $agric = $this->agriculture;
        $businessStudies = $this->business_studies;
        $computerStudies = $this->computer_studies;
        $drawingAndDesign = $this->drawing_and_design;
        $french = $this->french;
        $german = $this->german;
        $arabic = $this->arabic;
        $signLanguage = $this->sign_language;
        $music = $this->music;
        $woodWork = $this->wood_work;
        $metalWork = $this->metal_work;
        $buildConstr = $this->building_construction;
        $pwrMechanics = $this->power_mechanics;
        $electricity = $this->electricity;
        $aviationTech = $this->aviation_technology;

        return  collect([$math,$eng,$kis,$chem,$bio,$phy,$cre,$is,$histAndGovernment,$geography,$homeScience,$artAndDesign,$agric,$businessStudies,$computerStudies,$drawingAndDesign,$french,$german,$arabic,$signLanguage,$music,$woodWork,$metalWork,$buildConstr,$pwrMechanics,$electricity,$aviationTech])->sum();
    }

    public function getStudentMinscoreAttribute()
    {
        $sum = $this->total;
        $subjectsPerClass = $this->class->number_of_subjects_per_class;

        return  round($sum/$subjectsPerClass,1);
    }

    public function getOutOfAttribute()
    {
        if(($this->class->initials->value === ClassInitialsEnum::FORM1->value) || ($this->class->initials->value === ClassInitialsEnum::FORM2->value)){
            return (string)config('constants.f1_and_f2_out_of_marks');
        }

        if(($this->class->initials->value === ClassInitialsEnum::FORM3->value) || ($this->class->initials->value === ClassInitialsEnum::FORM4->value)){
            return (string)config('constants.f3_and_f4_out_of_marks');
        }
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('class','year','term','teacher','school','exam','subject');
    }
}
