<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Student;
use App\Models\Receipt;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class PaymentRecord extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =['student_id','payment_id','payment_section_id','amount_paid','balance','payment_mode','payment_ref_code','barcode','payment_date','verified','ref_no','accountant_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class)->withDefault();
    }

    public function payment_section(): BelongsTo
    {
        return $this->belongsTo(PaymentSection::class)->withDefault();
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id')->withDefault();
    }

    public function receipt(): HasMany
    {
        return $this->hasMany(Receipt::class, 'pr_id','id');
    }

    public function getCreatedAttribute()
    {
        $createdAt = $this->created_at;
        $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s',$createdAt)->format('d/m/Y');

        return $formatedDate;
    }
}
