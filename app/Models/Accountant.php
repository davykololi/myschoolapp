<?php

namespace App\Models;

use Exception;
use Mail;
use App\Models\UserEmailCode;
use App\Mail\SendEmailCode;
use App\Enums\AccountantsEnum;
use	Illuminate\Database\Eloquent\Casts\Attribute;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AccountantResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Accountant extends Authenticatable implements Searchable, BannableContract
{
    use HasFactory, Notifiable, Bannable;
    protected $guard = 'accountant';
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'accountants';
    protected $fillable = ['salutation','first_name','middle_name','last_name','blood_group','email','image','gender','id_no','emp_no','dob','designation','address','phone_no','history','role','school_id','password','is_banned'];
    protected $appends = ['age'];
    protected $casts = ['created_at' => 'datetime:d-m-Y H:i','role'=> AccountantsEnum::class];
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
            [ 'accountant_id' => auth()->user()->id ],
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
        $this->notify(new AccountantResetPasswordNotification($token));
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('superadmin.accountants.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function meetings()
    {
    	return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
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
        return $query->with('school','meetings','rewards',)->get();
    }

    public function user_email_code()
    {
        return $this->hasOne('App\Models\UserEmailCode','admin_id','id');
    }

    public function seniorAccountant()
    {
        return $this->role === AccountantsEnum::SA;
    }

    public function deputySeniorAccountant()
    {
        return $this->role === AccountantsEnum::DSA;
    }

    public function accountsAuditor()
    {
        return $this->role === AccountantsEnum::AA;
    }

    public function ordinaryAccountant()
    {
        return $this->role === AccountantsEnum::OA;
    }
}
