<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyClass extends Model
{
    use HasFactory;

    protected $table = 'classes';
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

    public function fees() {

        return $this->belongsMany('App\Models\Fee')->withTimestamps();
    }

    public function notes() {

        return $this->hasManyThrough('App\Models\Note','App\Models\Stream','class_id','stream_id','id');
    }

    public function students() {

        return $this->hasManyThrough('App\Models\Student','App\Models\Stream','class_id','stream_id','id');
    }
}
