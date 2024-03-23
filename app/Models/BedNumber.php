<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Dormitory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedNumber extends Model
{
    use HasFactory;

    protected $table = 'bed_numbers';
    protected $fillable = ['number','student_id','dormitory_id'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class)->withDefault();
    }

    public function dormitory(): BelongsTo
    {
        return $this->belongsTo(Dormitory::class)->withDefault();
    }
}
