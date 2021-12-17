<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionMatron extends Model
{
    use HasFactory;
    protected $table = 'position_matrons';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','desc','slug'];

    public function matrons() {

        return $this->hasMany('App\Models\Matron','position_matron_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('matrons')->get();
    }
}
