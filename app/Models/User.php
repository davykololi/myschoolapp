<?php

namespace App\Models;

use Exception;
use Mail;
use App\Models\UserEmailCode;
use App\Mail\SendEmailCode;
use Lab404\Impersonate\Models\Impersonate;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasRoles, Impersonate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['salutation','first_name', 'middle_name', 'last_name', 'email', 'password','school_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function generateCode()
    {
        $code = rand(100000,999999);
  
        UserEmailCode::updateOrCreate(
            [ 'user_id' => auth()->user()->id ],
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

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function superadmin()
    {
        return $this->hasOne(Superadmin::class,'user_id','id');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class,'user_id','id');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class,'user_id','id');
    }

    public function student()
    {
        return $this->hasOne(Student::class,'user_id','id');
    }

    public function parent()
    {
        return $this->hasOne(MyParent::class,'user_id','id');
    }

    public function librarian()
    {
        return $this->hasOne(Librarian::class,'user_id','id');
    }

    public function accountant()
    {
        return $this->hasOne(Accountant::class,'user_id','id');
    }

    public function matron()
    {
        return $this->hasOne(Matron::class,'user_id','id');
    }

    public function subordinate()
    {
        return $this->hasOne(Subordinate::class,'user_id','id');
    }

    public function fullName(): Attribute 
    {               
        return  new Attribute(                                                           
            get: fn () => ucfirst($this->first_name. " ".$this->middle_name." ".$this->last_name),                
        ); 
    }

    public function firstName(): Attribute 
    {               
        return  new Attribute(                                                           
            set: fn ($value) => ucfirst($value),                
        ); 
    }

    public function middleName(): Attribute 
    {               
        return  new Attribute(                                                           
            set: fn ($value) => ucfirst($value),                
        ); 
    }

    public function lastName(): Attribute 
    {               
        return  new Attribute(                                                           
            set: fn ($value) => ucfirst($value),                
        ); 
    }

    public function user_email_code(): HasOne
    {
        return $this->hasOne('App\Models\UserEmailCode','user_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('superadmin','admin','student','teacher','accountant','librarian','matron','subordinate','parent');
    }
}
