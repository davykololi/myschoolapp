<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionAccountant extends Model
{
    use HasFactory;
    protected $table = 'position_accountants';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','desc','slug'];

    public function accountants() {

        return $this->hasMany('App\Models\Accountant','position_accountant_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('accountants')->get();
    }
}
