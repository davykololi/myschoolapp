<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Payment extends Model
{
    //
    use HasUuids;
    
    protected $table = 'payments';
    protected $fillable = ['description','amount','ref_no','student_id','payment_section_id','special_id','school_id','year_id','lock'];
    protected $appends = ['paid','balance'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;
    
    public function student(): BelongsTo
    {
        return $this->belongsTo('App\Models\Student')->withDefault();
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo('App\Models\Year')->withDefault();
    }

    public function terms(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Term')->withTimestamps();
    }

    public function payment_records(): HasMany
    {
        return $this->hasMany('App\Models\PaymentRecord','payment_id');
    }

    public function payment_section(): BelongsTo
    {
        return $this->belongsTo('App\Models\PaymentSection')->withDefault();
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($payment) {
             foreach ($payment->payment_records as $payment_record) {
                 $payment_record->delete();
             }
        });
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','student','year','terms','payment_records','payment_section');
    }

    public function getPaidAttribute()
    {
        $amount = $this->amount; //For example the amount can be Kshs: 55000
        $paidPaymentRecords = $this->payment_records()->get()->pluck('amount_paid');
        $paidCollection = collect($paidPaymentRecords);
        $sumOfPaid = $paidCollection->sum();

        return $sumOfPaid;
    }

    public function getBalanceAttribute()
    {
        $amount = $this->amount;
        $paymentBal = $amount - $this->paid;

        return $paymentBal;
    }
}
