<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Mark;
use App\Models\StudentInfo;
use Illuminate\Support\Str;
use App\Enums\StudentsEnum;
use Exception;
use Mail;
use App\Models\UserEmailCode;
use App\Mail\SendEmailCode;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use	Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\StudentResetPasswordNotification;

class Student extends Authenticatable implements Searchable
{
    use HasFactory;
    use Notifiable;
    protected $fee_balances = [];
    protected $guard = 'student';
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'students';
    protected $fillable = ['salutation','first_name','middle_name','last_name','image','gender','email','role','blood_group','adm_mark','admission_no','phone_no','dob','doa','active','role','school_id','stream_id','intake_id','dormitory_id','admin_id','parent_id','password'];
    protected $appends = ['age','full_name','fee_balance'];
    protected $casts = ['created_at' => 'datetime:d-m-Y H:i','role'=> StudentsEnum::class];

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
            [ 'student_id' => auth()->user()->id ],
            [ 'code' => $code ]
        );
    
        try {
  
            $details = [
                'title' => 'Mail from'." ".auth()->user()->school->name,
                'code' => $code
            ];
             
            Mail::to(auth()->user()->email)->send(new SendEmailCode($details));
    
        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StudentResetPasswordNotification($token));
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.students.show', $this->id);

        return new SearchResult(
                $this,
                $this->full_name,
                $url
            );
    }

    public function schoolStudentLeader()
    {
    	return $this->role === StudentsEnum::SL;
    }

    public function assSchoolStudentLeader()
    {
        return $this->role === StudentsEnum::DSL;
    }

    public function ordinaryStudent()
    {
        return $this->role === StudentsEnum::OS;
    }

    public function streamPrefect()
    {
        return $this->role === StudentsEnum::SP;
    }

    public function assistantStreamPrefect()
    {
        return $this->role === StudentsEnum::ASP;
    }

    public function timeKeeper()
    {
        return $this->role === StudentsEnum::TK;
    }

    public function intake()
    {
        return $this->belongsTo('App\Models\Intake')->withDefault();
    }

    public function teachers(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Teacher')->withTimestamps();
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\MyParent')->withDefault();
    }

    public function exams(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }

    public function class()
    {
    	return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function stream()
    {
        return $this->belongsTo('App\Models\Stream')->withDefault();
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
     * @return BelongsToMany
     */
    public function attendances(): BelongsToMany
    {
        return $this->belongsToMany(Attendance::class)->withPivot('status');
    }

    /**
     * @return int
     */
    public function present_count(): int
    {
        return $this->belongsToMany(Attendance::class)->wherePivot('status', 1)->count();
    }

    /**
     * @return int
     */
    public function absent_count(): int
    {
        return $this->belongsToMany(Attendance::class)->wherePivot('status', 0)->count();
    }

    public function dormitory()
    {
        return $this->belongsTo('App\Models\Dormitory')->withDefault();
    }

    public function libraries(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Library')->withTimestamps();
    }

    public function payments()
    {
        return $this->hasMany('App\Models\Payment','student_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($student) {
             foreach ($student->payments as $payment) {
                 $payment->delete();
             }
        });
    }

    public function payment_records()
    {
        return $this->hasManyThrough('App\Models\PaymentRecord','App\Models\Payment','student_id','payment_id');
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

    public function halls(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Hall')->withTimestamps();
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin')->withDefault();
    }

    public function issued_books()
    {
        return $this->hasMany('App\Models\IssuedBook','student_id','id');
    }

    public function records()
    {
        return $this->hasMany('App\Models\Record','student_id','id');
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

    public function getDateFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F d, Y');
    }

    public function getDob()
    {
        $dob = $this->dob;
        return $dob;
    }

    public function getDoa()
    {
        $doa = $this->doa;
        return $doa;
    }

    public function getAdmissionMonth()
    {
        $doa = $this->doa;
        $x = Carbon::createFromFormat('d/m/Y',$doa)->format('d-m-Y H:i');
        $admissionMonth = Carbon::parse($x)->format("F");

        return $admissionMonth;
    }

    public function marks()
    {
        return $this->hasMany(Mark::class,'student_id','id');
    }

    public function student_info()
    {
        return $this->hasOne(StudentInfo::class,'student_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','libraries','teachers','class','stream','clubs','payments','payment_records');
    }

    public function getTotalPaymentAmountAttribute()
    {
        $studentPayments = $this->payments()->get()->pluck('amount');
        $totalAmountToPay = collect($studentPayments)->sum();

        return $totalAmountToPay;
    }

    public function getPaidAmountAttribute()
    {
        $studentPaymentRecords = $this->payment_records()->get()->pluck('amount_paid');
        $sumPaid = collect($studentPaymentRecords)->sum();

        return $sumPaid;
    }

    public function getFeeBalanceAttribute()
    {
        $feeBalance = $this->total_payment_amount - $this->paid_amount;

        return $feeBalance;
    }
}
