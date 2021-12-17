<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    protected $table = 'terms';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','code','school_id'];

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function marks()
    {
        return $this->hasMany('App\Models\Mark','term_id','id');
    }

    public function exams()
    {
        return $this->hasMany('App\Models\Exam','term_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school')->get();
    }
}
