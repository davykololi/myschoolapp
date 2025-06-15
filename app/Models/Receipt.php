<?php

namespace App\Models;

use App\Models\PaymentRecord;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Receipt extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['pr_id', 'year', 'balance', 'amount_paid'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function pr(): BelongsTo
    {
        return $this->belongsTo(PaymentRecord::class, 'pr_id');
    }
}
