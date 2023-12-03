<?php

namespace App\Models;

use App\Models\PaymentRecord;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = ['pr_id', 'year', 'balance', 'amount_paid'];

    public function pr(): BelongsTo
    {
        return $this->belongsTo(PaymentRecord::class, 'pr_id');
    }
}
