<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySchool extends Model
{
    use HasFactory;

    protected $table = 'category_schools';
    protected $fillable = ['name','desc','slug'];

    public function schools() {

        return $this->hasMany('App\Models\School','category_school_id','id');
    }
}
