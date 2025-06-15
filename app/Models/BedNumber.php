<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Dormitory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class BedNumber extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'bed_numbers';
    protected $fillable = ['number','student_id','dormitory_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class)->withDefault();
    }

    public function dormitory(): BelongsTo
    {
        return $this->belongsTo(Dormitory::class)->withDefault();
    }
}
