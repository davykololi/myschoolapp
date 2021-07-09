<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryExam extends Model
{
    use HasFactory;

    protected $table = 'category_exams';
    protected $fillable = ['name','desc','slug'];

    public function exams() {

        return $this->hasMany('App\Models\Exam','category_exam_id','id');
    }
}
