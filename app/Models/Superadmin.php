<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\SuperadminResetPasswordNotification;

class Superadmin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'superadmin';
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'superadmins';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['name','title','email','address','password'];

    /**
    * The attributes that should be hidden for arrays.
    *
    *@var array
    */
    protected $hidden = ['password','remember_token',];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SuperadminResetPasswordNotification($token));
    }


    public function admins()
    {
    	return $this->hasMany('App\Models\Admin','superadmin_id','id');
    }

    public function ownsAdmin(Admin $admin)
    {
        return auth()->id() == $admin->superadmin->id;
    }

    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function rewards()
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
}
