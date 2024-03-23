<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Library;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryNumber extends Model
{
    use HasFactory;

    protected $table = 'library_numbers';
    protected $fillable = ['number','student_id','library_id'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class)->withDefault();
    }

    public function library(): BelongsTo
    {
        return $this->belongsTo(Library::class)->withDefault();
    }
}
