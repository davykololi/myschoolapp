<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $table = 'years';
    protected $fillable = ['year','desc'];

    public function marks()
    {
        return $this->hasMany('App\Models\Mark','year_id','id');
    }

    public function exams()
    {
        return $this->hasMany('App\Models\Exam','year_id','id');
    }
}
