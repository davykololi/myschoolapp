<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    use HasFactory;
    protected $table = 'blood_groups';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['type','desc','slug'];

    public function teachers() {

        return $this->hasMany('App\Models\Teacher','bg_id','id');
    }

    public function students() {

        return $this->hasMany('App\Models\Student','bg_id','id');
    }

    public function accountants() {

        return $this->hasMany('App\Models\Accountant','bg_id','id');
    }

    public function matrons() {

        return $this->hasMany('App\Models\Matron','bg_id','id');
    }

    public function staffs() {

        return $this->hasMany('App\Models\Staff','bg_id','id');
    }

    public function librarians() {

        return $this->hasMany('App\Models\Librarian','bg_id','id');
    }

    public function parents() {

        return $this->hasMany('App\Models\MyParent','bg_id','id');
    }
}
