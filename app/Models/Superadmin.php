<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Notifications\SuperadminResetPasswordNotification;

class Superadmin extends Model
{
    use Notifiable;
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'superadmins';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['address','user_id','school_id'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SuperadminResetPasswordNotification($token));
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function user() 
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function ownsAdmin(Admin $admin)
    {
        return auth()->id() == $admin->superadmin->id;
    }

    public function assignments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function rewards(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }
}
