<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Library;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class LibraryNumber extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'library_numbers';
    protected $fillable = ['number','student_id','library_id'];

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

    public function library(): BelongsTo
    {
        return $this->belongsTo(Library::class)->withDefault();
    }
}
