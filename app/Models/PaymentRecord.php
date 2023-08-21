<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Student;
use App\Models\Receipt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRecord extends Model
{
    use HasFactory;

    protected $fillable =['student_id','payment_id','amount_paid','balance','bank_name','file','payment_receipt_ref','payment_date','verified','ref_no'];

    public function payment()
    {
        return $this->belongsTo(Payment::class)->withDefault();
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id')->withDefault();
    }

    public function receipt()
    {
        return $this->hasMany(Receipt::class, 'pr_id','id');
    }
}
