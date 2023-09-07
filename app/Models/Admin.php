<?php

namespace App\Models;

use Exception;
use Mail;
use App\Models\UserEmailCode;
use App\Mail\SendEmailCode;
use App\Enums\AdminsEnum;
use App\Models\Gallery;
use Carbon\Carbon;
use	Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'admins';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['salutation','first_name','middle_name','last_name','blood_group','email','image','gender','id_no','emp_no','dob','designation','address','phone_no','role','history','school_id','superadmin_id','password','is_banned'];
    protected $appends = ['age'];
    protected $casts = ['created_at' => 'datetime:d-m-Y H:i','role'=> AdminsEnum::class];
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
            [ 'admin_id' => auth()->user()->id ],
            [ 'code' => $code ]
        );
    
        try {
  
            $details = [
                'title' => 'Mail Sent from'." ".config('app.name'),
                'code' => $code,
            ];
             
            Mail::to(auth()->user()->email)->send(new SendEmailCode($details));
    
        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function superadmin()
    {
    	return $this->belongsTo('App\Models\Superadmin')->withDefault();
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student','admin_id','id');
    }

    public function teachers()
    {
        return $this->hasMany('App\Models\Teacher','admin_id','id');
    }

    public function staffs()
    {
        return $this->hasMany('App\Models\Staff','admin_id','id');
    }

    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function rewards()
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function getAgeAttribute()       
    { 
        $myDate = $this->dob;
        $change = Carbon::createFromFormat('d/m/Y',$myDate)->format('d-m-Y H:i');
        $years = Carbon::parse($change)->age;

        return $years;     
    }

    public function getImageUrlAttribute()       
    { 
        return URL::asset('/storage/storage/'.$this->image);   
    }

    public function getFullNameAttribute()       
    {        
        return $this->first_name . " " . $this->middle_name ." ". $this->last_name;       
    }

    public function	firstName(): Attribute 
    {				
        return	new	Attribute(								                             
            set: fn	($value) =>	ucfirst($value),				
        ); 
    }

    public function	middleName(): Attribute 
    {				
        return	new	Attribute(								                             
            set: fn	($value) =>	ucfirst($value),				
        ); 
    }

    public function	lastName(): Attribute 
    {				
        return	new	Attribute(								                             
            set: fn	($value) =>	ucfirst($value),				
        ); 
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('superadmin','school')->get();
    }

    public function user_email_code()
    {
        return $this->hasOne('App\Models\UserEmailCode','admin_id','id');
    }

    public function seniorAdmin()
    {
        return $this->role === AdminsEnum::SA;
    }

    public function deputySeniorAdmin()
    {
        return $this->role === AdminsEnum::DSA;
    }

    public function studentRegistrar()
    {
        return $this->role === AdminsEnum::SR;
    }

    public function examRegistrar()
    {
        return $this->role === AdminsEnum::ER;
    }

    public function academicRegistrar()
    {
        return $this->role === AdminsEnum::AR;
    }

    public function ordinayAdmin()
    {
        return $this->role === AdminsEnum::OA;
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class,'admin_id','id');
    }
}
