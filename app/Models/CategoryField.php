<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryField extends Model
{
    use HasFactory;

    protected $table = 'category_fields';
    protected $fillable = ['name','desc','slug'];

    public function fields() {

        return $this->hasMany('App\Models\Field','category_field_id','id');
    }
}
