<?php

namespace App\Models;

use App\Models\User;
use Carbon\Carbon;
use App\Models\Mark;
use App\Models\StudentInfo;
use Illuminate\Support\Str;
use App\Enums\StudentPositionEnum;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use	Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\StudentResetPasswordNotification;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Student extends Model implements Searchable
{
    use HasFactory, Notifiable, HasUuids;
    
    protected $fee_balances = [];
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'students';
    protected $fillable = ['image','gender','blood_group','adm_mark','admission_no','phone_no','dob','doa','active','position','stream_id','intake_id','dormitory_id','admin_id','parent_id','is_banned','payment_locked','lock','user_id','school_id'];
    protected $appends = ['age','image_url','fee_balance'];
    protected $casts = ['created_at' => 'datetime:d-m-Y H:i','position'=> StudentPositionEnum::class];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

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

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function user() 
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function bed_number() 
    {
        return $this->hasOne(BedNumber::class,'student_id','id');
    }

    public function schoolStudentLeader()
    {
    	return $this->position === StudentPositionEnum::SL;
    }

    public function assSchoolStudentLeader()
    {
        return $this->position === StudentPositionEnum::DSL;
    }

    public function ordinaryStudent()
    {
        return $this->position === StudentPositionEnum::OS;
    }

    public function streamPrefect()
    {
        return $this->position === StudentPositionEnum::SP;
    }

    public function assistantStreamPrefect()
    {
        return $this->position === StudentPositionEnum::ASP;
    }

    public function timeKeeper()
    {
        return $this->position === StudentPositionEnum::TK;
    }

    public function intake(): BelongsTo
    {
        return $this->belongsTo('App\Models\Intake')->withDefault();
    }

    public function teachers(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Teacher')->withTimestamps();
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo('App\Models\MyParent')->withDefault();
    }

    public function exams(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Exam')->withTimestamps();
    }

    public function class(): BelongsTo
    {
    	return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function stream(): BelongsTo
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
    public function present_count(): BelongsToMany
    {
        return $this->belongsToMany(Attendance::class)->wherePivot('status', 1)->count();
    }

    /**
     * @return int
     */
    public function absent_count(): BelongsToMany
    {
        return $this->belongsToMany(Attendance::class)->wherePivot('status', 0)->count();
    }

    public function dormitory(): BelongsTo
    {
        return $this->belongsTo('App\Models\Dormitory')->withDefault();
    }

    public function libraries(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Library')->withTimestamps();
    }

    public function payments(): hasMany
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

    public function payment_records(): HasManyThrough
    {
        return $this->hasManyThrough('App\Models\PaymentRecord','App\Models\Payment','student_id','payment_id');
    }

    public function meetings(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function awards(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Award')->withTimestamps();
    }

    public function clubs(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Club')->withTimestamps();
    }

    public function halls(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Hall')->withTimestamps();
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin')->withDefault();
    }

    public function issued_books(): HasMany
    {
        return $this->hasMany('App\Models\IssuedBook','student_id','id');
    }

    public function records(): HasMany
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

    public function marks(): HasMany
    {
        return $this->hasMany(Mark::class,'student_id','id');
    }

    public function student_info(): HasOne
    {
        return $this->hasOne(StudentInfo::class,'student_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('libraries','teachers','stream','clubs','payments','payment_records','user','dormitory','bed_number');
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
