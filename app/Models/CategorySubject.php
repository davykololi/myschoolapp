<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySubject extends Model
{
    use HasFactory;

    protected $table = 'category_subjects';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','desc','slug'];

    public function subjects() {

        return $this->hasMany('App\Models\Subject','category_subject_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('subjects')->get();
    }
}
