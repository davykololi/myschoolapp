<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    //
    protected $table = 'fees';
    protected $fillable = ['year','amount','student_id','school_id','stream_id','category_fee_id'];

    public function category_fee()
    {
    	return $this->belongsTo('App\Models\CategoryFee')->withDefault();
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student')->withDefault();
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function classes()
    {
        return $this->belongsToMany('App\Models\MyClass')->withTimestamps();
    }

    public function stream()
    {
        return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function admissions()
    {
        return $this->belongsToMany('App\Models\Admission')->withTimestamps();
    }
}
