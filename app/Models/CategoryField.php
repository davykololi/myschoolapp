<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryField extends Model
{
    use HasFactory;

    protected $table = 'category_fields';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','desc','slug'];

    public function fields() {

        return $this->hasMany('App\Models\Field','category_field_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('fields')->get();
    }
}
