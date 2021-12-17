<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionTeacher extends Model
{
    use HasFactory;

    protected $table = 'position_teachers';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','desc','slug'];

    public function teachers() {

        return $this->hasMany('App\Models\Teacher','position_teacher_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('teachers')->get();
    }
}
