<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionStudent extends Model
{
    use HasFactory;

    protected $table = 'position_students';
    protected $fillable = ['name','desc','slug'];

    public function students() {

        return $this->hasMany('App\Models\Student','position_student_id','id');
    }
}
