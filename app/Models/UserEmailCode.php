<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class UserEmailCode extends Model
{
    use HasFactory, HasUuids;

    public $table = "user_email_codes";

    protected $fillable = ['code','user_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
