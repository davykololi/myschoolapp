<?php

namespace App\Models;

use App\Models\StandardSubject;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Str;
use Exception;
use Mail;
use App\Models\UserEmailCode;
use App\Models\ReportSubjectGrade;
use App\Mail\SendEmailCode;
use App\Enums\TeacherRoleEnum;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notifiable;
use	Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Notifications\TeacherResetPasswordNotification;

class Teacher extends Authenticatable implements Searchable
{
    use Notifiable;
    protected $guard = 'teacher';
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'teachers';
    protected $fillable = ['salutation','first_name','middle_name','last_name','blood_group','email','image','gender','id_no','emp_no','dob','designation','address','phone_no','role','history','school_id','password','is_banned'];
    protected $appends = ['age'];

    /**
    * The attributes that should be hidden for arrays.
    *
    *@var array
    */
    protected $hidden = ['password','remember_token',];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime','created_at' => 'datetime:d-m-Y H:i','role'=> TeacherRoleEnum::class];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function generateCode()
    {
        $code = rand(100000,999999);
  
        UserEmailCode::updateOrCreate(
            [ 'teacher_id' => auth()->user()->id ],
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
        $this->notify(new TeacherResetPasswordNotification($token));
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.teachers.show', $this->id);

        return new SearchResult(
                $this,
                $this->full_name,
                $url
            );
    }

    public function students(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Student')->withTimestamps();
    }

    public function timetables(): HasMany
    {
        return $this->hasMany('App\Models\Timetable','teacher_id','id');
    }

    /**
     * @return BelongsToMany
     */
    public function streams(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Stream')->withTimestamps();
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Department')->withTimestamps();
    }

    public function assignments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Subject')->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'teacher_id', 'id');
    }

    public function meetings(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function rewards(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function clubs(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Club')->withTimestamps();
    }

    public function exams(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin')->withDefault();
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

    public function fullName(): Attribute 
    {               
        return  new Attribute(                                                           
            get: fn () => ucfirst($this->first_name. " ".$this->middle_name." ".$this->last_name),                
        ); 
    }

    public function stream_subjects(): HasMany
    {
        return $this->hasMany('App\Models\StreamSubjectTeacher','teacher_id','id');
    }

    public function notes(): HasMany
    {
        return $this->hasMany('App\Models\Note','teacher_id','id');
    }

    public function getDateFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F d, Y');
    }

    public function getExcerptAttribute()
    {
        return substr(strip_tags($this->history), 0, 100);
    }

    public function getDob()
    {
        $dob = $this->dob;
        return $dob;
    }

    public function marks(): HasMany
    {
        return $this->hasMany('App\Models\Mark','teacher_id','id');
    }

    public function report_cards(): HasMany
    {
        return $this->hasMany('App\Models\ReportCard','teacher_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('streams','school','students','departments')->get();
    }

    public function grades(): HasMany
    {
        return $this->hasMany('App\Models\GradeSystem','teacher_id','id');
    }

    public function user_email_code(): HasOne
    {
        return $this->hasOne('App\Models\UserEmailCode','teacher_id','id');
    }

    public function classTeacher()
    {
        return $this->role === TeacherRoleEnum::CT;
    }

    public function headTeacher()
    {
        return $this->role === TeacherRoleEnum::HT;
    }

    public function deputyHeadTeacher()
    {
        return $this->role === TeacherRoleEnum::DHT;
    }

    public function headScienceDept()
    {
        return $this->role === TeacherRoleEnum::HSD;
    }

    public function assistantHeadScinceDept()
    {
        return $this->role === TeacherRoleEnum::AHSD;
    }

    public function headHumanityDept()
    {
        return $this->role === TeacherRoleEnum::HHD;
    }

    public function assistantHeadHumanityDept()
    {
        return $this->role === TeacherRoleEnum::AHHD;
    }

    public function headMathsDept()
    {
        return $this->role === TeacherRoleEnum::HMD;
    }

    public function assistantHeadMathsDept()
    {
        return $this->role === TeacherRoleEnum::AHMD;
    }

    public function headLanguagesDept()
    {
        return $this->role === TeacherRoleEnum::HLD;
    }

    public function assistantHeadLanguagesDept()
    {
        return $this->role === TeacherRoleEnum::AHLD;
    }

    public function staffTeacher()
    {
        return $this->role === TeacherRoleEnum::ST;
    }

    public function report_subject_grades(): HasMany
    {
        return $this->hasMany(ReportSubjectGrade::class,'teacher_id','id');
    }
}
