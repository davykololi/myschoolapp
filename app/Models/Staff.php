<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Mail;
use App\Models\UserEmailCode;
use App\Mail\SendEmailCode;
use	Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use App\Enums\StaffsEnum;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\StaffResetPasswordNotification;

class Staff extends Authenticatable implements Searchable
{
    use Notifiable;
    protected $guard = 'staff';
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'staffs';
    protected $fillable = ['salutation','first_name','middle_name','last_name','role','blood_group','image','gender','email','emp_no','id_no','dob','designation','address','phone_no','role','history','school_id','password','superadmin_id','is_banned'];
    protected $appends = ['age'];
    protected $casts = ['created_at' => 'datetime:d-m-Y H:i','role'=> StaffsEnum::class];

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
            [ 'staff_id' => auth()->user()->id ],
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
        $this->notify(new StaffResetPasswordNotification($token));
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.staffs.show', $this->id);

        return new SearchResult(
                $this,
                $this->full_name,
                $url,
            );
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function departments()
    {
    	return $this->belongsToMany('App\Models\Department')->withTimestamps();
    }

    public function meetings()
    {
    	return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function rewards()
    {
    	return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function clubs()
    {
    	return $this->belongsToMany('App\Models\Club')->withTimestamps();
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin')->withDefault();
    }

    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function getAgeAttribute()       
    { 
        $myDate = $this->dob;
        $change = Carbon::createFromFormat('d, M, Y',$myDate)->format('d-m-Y H:i');
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
        return $query->with('school','departments','meetings','rewards','clubs','assignments','admin')->get();
    }

    public function schoolSecretary()
    {
        return $this->role === StaffsEnum::SS;
    }

    public function seniorCook()
    {
        return $this->role === StaffsEnum::SC;
    }

    public function ordinaryCook()
    {
        return $this->role === StaffsEnum::OC;
    }

    public function seniorSecurity()
    {
        return $this->role === StaffsEnum::SSCRTY;
    }

    public function ordinarySecurity()
    {
        return $this->role === StaffsEnum::OSCRTY;
    }

    public function schoolGardener()
    {
        return $this->role === StaffsEnum::GDNR;
    }

    public function schoolElectrician()
    {
        return $this->role === StaffsEnum::SE;
    }

    public function teaServer()
    {
        return $this->role === StaffsEnum::TS;
    }
}
