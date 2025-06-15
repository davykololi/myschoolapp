<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Notifications\SuperadminResetPasswordNotification;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Superadmin extends Model
{
    use Notifiable, HasUuids;
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'superadmins';
    
    protected $fillable = ['address','user_id','school_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

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
