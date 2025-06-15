<?php

namespace App\Imports\StudentsSheetImport;

use Auth;
use App\Models\User;
use App\Models\Student;
use App\Models\StudentInfo;
use App\Models\Myclass;
use App\Models\Stream;
use App\Models\Dormitory;
use App\Models\Intake;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WestStreamStudentsSheetImport implements OnEachRow, WithHeadingRow,WithChunkReading,WithUpserts
{
    protected $dormId, $intakeId,$westId;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($dormId, $intakeId,$westId)
    {
        $this->dormId = $dormId;
        $this->intakeId = $intakeId;
        $this->westId = $westId;
    }

    public function uniqueBy()
    {
        return 'admission_no';
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {   
        $rowIndex = $row->getIndex();

        if($rowIndex >= 200)
            return; // Not more than 200 rows at a time

        $row = $row->toArray();

        $user = [
            'salutation' => $row[__('salutation')],
            'first_name' => $row[__('first_name')],
            'middle_name' => $row[__('middle_name')],
            'last_name' => $row[__('last_name')],
            'email' => $row[__('email')],
            'gender' => $row[__('gender')],
            'password' => Hash::make($row[__('password')]),
            'school_id' => auth()->user()->school->id,

        ];

        $usertb = User::create($user);

        $student = [
            'user_id' => $usertb->id,
            'image' => asset('static/avatar.png'),
            'gender' => $row[__('gender')],
            'position' => 'Ordinary Student',
            'blood_group' => $row[__('blood_group')],
            'adm_mark' => $row[__('adm_mark')],
            'admission_no' => $row[__('admission_no')],
            'phone_no' => $row[__('phone_no')],
            'dob' => $row[__('dob')],
            'doa' => $row[__('doa')],
            'active' => 1,
            'stream_id' => $this->getStreamId(),
            'admin_id' => auth()->user()->id,
            'dorm_id' => $this->getDormId(),
            'parent_id' => 1,
            'intake_id' => $this->getIntakeId(),
            'school_id' => auth()->user()->school->id,
            'is_banned' => false,
            'payment_locked' => true,
            'lock' => 'enabled',
        ];

        $tb = Student::create($student);

        $student_info = [
            'student_id'  => $tb->id,
            'admin_id' => 1,
            'religion' => $row[__('religion')] ?? '',
            'fathers_name' => $row[__('fathers_name')] ?? '',
            'fathers_phone_number' => $row[__('fathers_phone_number')] ?? '',
            'fathers_national_id' => $row[__('fathers_national_id')] ?? '',
            'fathers_occupation' => $row[__('fathers_occupation')] ?? '',
            'fathers_designation' => $row[__('fathers_designation')] ?? '',
            'fathers_annual_income' => $row[__('fathers_annual_income')] ?? 0,
            'mothers_name' => $row[__('mothers_name')],
            'mothers_phone_number' => $row[__('mothers_phone_number')] ?? '',
            'mothers_national_id' => $row[__('mothers_national_id')] ?? '',
            'mothers_occupation' => $row[__('mothers_occupation')] ?? '',
            'mothers_designation' => $row[__('mothers_designation')] ?? '',
            'mothers_annual_income' => $row[__('mothers_annual_income')] ?? 0,
            'guardian_name' => $row[__('guardian_name')] ?? 0,
            'guardian_relationship' => $row[__('guardian_relationship')] ?? 0,
            'guardian_phone_number' => $row[__('guardian_phone_number')] ?? 0,
            'guardian_occupation' => $row[__('guardian_occupation')] ?? 0,
            'home_email_address' => $row[__('home_email_address')] ?? 0,
            'home_postal_address' => $row[__('home_postal_address')] ?? 0,
            
        ];
        
        StudentInfo::create($student_info);
    }

    public function rules(): array
    {
        return [
            'salutation' => 'required|string',
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
            'gender' => 'required|string',
        ];
    }

    public function getStreamId()
    {
        $streamId = Stream::where(['id'=>$this->westId,'school_id'=>Auth::user()->school->id])->firstOrFail();

        return $streamId;
    }

    public function getDormId()
    {
        $dormId = Dormitory::where(['id'=>$this->dormId,'school_id'=>Auth::user()->school->id])->firstOrFail();

        return $dormId;
    }

    public function getIntakeId()
    {
        $intakeId = Intake::where(['id'=>$this->intakeId,'school_id'=>Auth::user()->school->id])->firstOrFail();

        return $intakeId;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
