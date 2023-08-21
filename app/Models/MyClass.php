<?php

namespace App\Models;

use App\Models\ReportComment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyClass extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','desc','slug','school_id'];

    public function school() {

        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function marks() {

        return $this->hasMany('App\Models\Mark','class_id','id');
    }

    public function streams() {

        return $this->hasMany('App\Models\Stream','class_id','id');
    }

    public function timetables() {

        return $this->hasMany('App\Models\Timetable','class_id','id');
    }

    public function notes() {

        return $this->hasManyThrough('App\Models\Note','App\Models\Stream','class_id','stream_id','id');
    }

    public function students() {

        return $this->hasManyThrough('App\Models\Student','App\Models\Stream','class_id','stream_id','id');
    }

    public function report_cards()
    {
        return $this->hasMany('App\Models\ReportCard','class_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('students','streams','school')->get();
    }

    public function grades()
    {
        return $this->hasMany('App\Models\Grade','class_id','id');
    }

    public function general_grades()
    {
        return $this->hasMany('App\Models\GeneralGrade','class_id','id');
    }

    public function report_comments()
    {
        return $this->hasMany(ReportComment::class,'class_id','id');
    }

    public function males()
    {
        return $this->hasManyThrough('App\Models\Student','App\Models\Stream','class_id','stream_id','id')->where(['gender'=>'Male'])->count();
    }

    public function females()
    {
        return $this->hasManyThrough('App\Models\Student','App\Models\Stream','class_id','stream_id','id')->where(['gender'=>'Female'])->count();
    }
}
