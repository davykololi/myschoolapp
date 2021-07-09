<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionStaff extends Model
{
    use HasFactory;

    protected $table = 'position_staffs';
    protected $fillable = ['name','desc','slug'];

    public function staffs() {

        return $this->hasMany('App\Models\Staff','position_staff_id','id');
    }
}
