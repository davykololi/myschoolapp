<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeSystem extends Model
{
    use HasFactory;

    protected $table = 'grade_systems';
    protected $fillable = ['grade','points','from_mark','to_mark','school_id','class_id','stream_id','year_id','section_id'];

    public function section()
    {
    	return $this->belongsTo('App\Models\Section')->withDefault();
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function class()
    {
    	return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function stream()
    {
    	return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function year()
    {
    	return $this->belongsTo('App\Models\Year')->withDefault();
    }
}
