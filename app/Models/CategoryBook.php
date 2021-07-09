<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBook extends Model
{
    use HasFactory;

    protected $table = 'category_books';
    protected $fillable = ['name','desc','slug'];

    public function books() {

        return $this->hasMany('App\Models\Book','category_book_id','id');
    }
}
