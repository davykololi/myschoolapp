<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFee extends Model
{
    use HasFactory;

    protected $table = 'category_fees';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','desc','slug'];

    public function fees() {

        return $this->hasMany('App\Models\Fee','category_fee_id','id');
    }
}
