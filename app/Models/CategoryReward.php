<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryReward extends Model
{
    use HasFactory;

    protected $table = 'category_rewards';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','desc','slug'];

    public function rewards() {

        return $this->hasMany('App\Models\Reward','category_reward_id','id');
    }
}
