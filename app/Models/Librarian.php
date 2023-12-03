<?php

namespace App\Models;

use Exception;
use Mail;
use App\Models\UserEmailCode;
use App\Mail\SendEmailCode;
use	Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Carbon\Carbon;
use App\Enums\LibrariansEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\LibrarianResetPasswordNotification;

class Librarian extends Authenticatable implements Searchable
{
    use Notifiable;
    protected $guard = 'librarian';
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'librarians';
    protected $fillable = ['salutation','first_name','middle_name','last_name','role','blood_group','email','image','gender','id_no','emp_no','dob','designation','address','phone_no','role','history','school_id','password','is_banned'];
    protected $appends = ['age'];
    protected $casts = ['created_at' => 'datetime:d-m-Y H:i','role'=> LibrariansEnum::class];

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
            [ 'librarian_id' => auth()->user()->id ],
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
        $this->notify(new LibrarianResetPasswordNotification($token));
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('superadmin.librarians.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function libraries(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Library')->withTimestamps();
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
        return $query->with('school')->get();
    }

    public function user_email_code(): HasOne
    {
        return $this->hasOne('App\Models\UserEmailCode','admin_id','id');
    }

    public function seniorLibrarian()
    {
        return $this->role === LibrariansEnum::SL;
    }

    public function assistantSeniorLibrarian()
    {
        return $this->role === LibrariansEnum::ASL;
    }

    public function libraryAuditor()
    {
        return $this->role === LibrariansEnum::LA;
    }

    public function ordinaryLibrarian()
    {
        return $this->role === LibrariansEnum::OL;
    }
}
