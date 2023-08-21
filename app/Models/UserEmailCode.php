<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher')->withDefault();
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin')->withDefault();
    }

    public function librarian()
    {
        return $this->belongsTo('App\Models\Librarian')->withDefault();
    }

    public function superadmin()
    {
        return $this->belongsTo('App\Models\Superadmin')->withDefault();
    }

    public function accountant()
    {
        return $this->belongsTo('App\Models\Accountant')->withDefault();
    }
}
