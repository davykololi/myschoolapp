<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSection extends Model
{
    use HasFactory;
    protected $table = 'payment_sections';
    protected $fillable = ['name','description','payment_amount','ref_no','reciept_footer_info','school_id'];

    public function payments(): HasMany
    {
        return $this->hasMany('App\Models\Payment','payment_section_id','id');
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('payments','school');
    }
}
