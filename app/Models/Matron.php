<?php

namespace App\Models;

use Exception;
use Mail;
use App\Models\UserEmailCode;
use App\Mail\SendEmailCode;
use	Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Notifications\MatronResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Matron extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $guard = 'matron';

    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'matrons';
    protected $fillable = ['salutation','first_name','middle_name','last_name','blood_group','email','image','gender','id_no','emp_no','dob','designation','address','phone_no','role','history','school_id','password','is_banned'];
    protected $appends = ['age'];
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
            [ 'matron_id' => auth()->user()->id ],
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
        $this->notify(new MatronResetPasswordNotification($token));
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function meetings(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function rewards(): BelongsToMany
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
        return $query->with('school','meetings','rewards')->get();
    }
}
