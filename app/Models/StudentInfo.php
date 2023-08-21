<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    use HasFactory;

    protected $table = 'student_infos';
    protected $fillable = ['religion','fathers_name','fathers_phone_number','fathers_national_id','fathers_occupation','fathers_designation','fathers_annual_income','mothers_name','mothers_phone_number','mothers_national_id','mothers_occupation','mothers_designation','mothers_annual_income','guardian_name','guardian_relationship','guardian_phone_number','guardian_occupation','home_email_address','home_postal_address','student_id','admin_id'];
    /**
     * Get the student record associated with the user.
    */
    public function student()
    {
        return $this->belongsTo(Student::class)->withDefault();
    }
}
