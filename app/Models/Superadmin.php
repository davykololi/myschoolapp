<?php

namespace App\Models;

use Exception;
use Mail;
use App\Models\UserEmailCode;
use App\Mail\SendEmailCode;
use App\Models\Admin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    protected $fillable = ['name','title','email','address','school_id','password'];

    /**
    * The attributes that should be hidden for arrays.
    *
    *@var array
    */
    protected $hidden = ['password','remember_token',];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function generateCode()
    {
        $code = rand(100000,999999);
  
        UserEmailCode::updateOrCreate(
            [ 'superadmin_id' => auth()->user()->id ],
            [ 'code' => $code ]
        );
    
        try {
  
            $details = [
                'title' => 'Mail Sent from'." ".auth()->user()->school->name,
                'code' => $code,
                'school' => auth()->user()->school->name,
            ];
             
            Mail::to(auth()->user()->email)->send(new SendEmailCode($details));
    
        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SuperadminResetPasswordNotification($token));
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function admins(): HasMany
    {
    	return $this->hasMany('App\Models\Admin','superadmin_id','id');
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

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
}
