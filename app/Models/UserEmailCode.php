<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserEmailCode extends Model
{
    use HasFactory;

    public $table = "user_email_codes";

    protected $fillable = [
        'teacher_id',
        'staff_id',
        'admin_id',
        'superadmin_id',
        'matron_id',
        'accountant_id',
        'librarian_id',
        'student_id',
        'code',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo('App\Models\Teacher')->withDefault();
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin')->withDefault();
    }

    public function librarian(): BelongsTo
    {
        return $this->belongsTo('App\Models\Librarian')->withDefault();
    }

    public function superadmin(): BelongsTo
    {
        return $this->belongsTo('App\Models\Superadmin')->withDefault();
    }

    public function accountant(): BelongsTo
    {
        return $this->belongsTo('App\Models\Accountant')->withDefault();
    }
}
