<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionLibrarian extends Model
{
    use HasFactory;

    protected $table = 'position_librarians';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','desc','slug'];

    public function librarians() {

        return $this->hasMany('App\Models\Librarian','position_librarian_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('librarians',)->get();
    }
}
