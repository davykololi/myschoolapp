<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryHall extends Model
{
    use HasFactory;

    protected $table = 'category_halls';
    protected $fillable = ['name','desc','slug'];

    public function halls() {

        return $this->hasMany('App\Models\Hall','category_hall_id','id');
    }
}
