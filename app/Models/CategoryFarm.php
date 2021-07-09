<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFarm extends Model
{
    use HasFactory;

    protected $table = 'category_farms';
    protected $fillable = ['name','desc','slug'];

    public function farms() {

        return $this->hasMany('App\Models\Farm','category_farm_id','id');
    }
}
