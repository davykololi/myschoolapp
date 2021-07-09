<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionTeacher extends Model
{
    use HasFactory;

    protected $table = 'position_teachers';
    protected $fillable = ['name','desc','slug'];

    public function teachers() {

        return $this->hasMany('App\Models\Teacher','position_teacher_id','id');
    }
}
