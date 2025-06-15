<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class StudentInfo extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'student_infos';
    protected $fillable = ['religion','fathers_name','fathers_phone_number','fathers_national_id','fathers_occupation','fathers_designation','fathers_annual_income','mothers_name','mothers_phone_number','mothers_national_id','mothers_occupation','mothers_designation','mothers_annual_income','guardian_name','guardian_relationship','guardian_phone_number','guardian_occupation','home_email_address','home_postal_address','student_id','admin_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;
    
    /**
     * Get the student record associated with the user.
    */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class)->withDefault();
    }
}
