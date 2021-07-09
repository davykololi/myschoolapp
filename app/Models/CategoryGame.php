<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryGame extends Model
{
    use HasFactory;

    protected $table = 'category_games';
    protected $fillable = ['name','desc','slug'];

    public function games() {

        return $this->hasMany('App\Models\Game','category_game_id','id');
    }
}
