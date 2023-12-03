<?php

namespace App\Imports\StudentsSheetImport;

use Auth;
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

class NorthStreamStudentsSheetImport implements OnEachRow, WithHeadingRow,WithChunkReading,WithUpserts
{
    protected $dormId, $intakeId,$northId;

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($streamId, $dormId, $intakeId,$northId)
    {
        $this->streamId = $streamId;
        $this->dormId = $dormId;
        $this->intakeId = $intakeId;
        $this->northId = $northId;
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

        $student = [
            'title' => $row[__('title')],
            'first_name' => $row[__('first_name')],
            'middle_name' => $row[__('middle_name')],
            'last_name' => $row[__('last_name')],
            'image' => asset('static/avatar.png'),
            'gender' => $row[__('gender')],
            'email' => $row[__('email')],
            'role' => 'Ordinary Student',
            'blood_group' => $row[__('blood_group')],
            'adm_mark' => $row[__('adm_mark')],
            'admission_no' => $row[__('admission_no')],
            'phone_no' => $row[__('phone_no')],
            'dob' => $row[__('dob')],
            'doa' => $row[__('doa')],
            'password' => Hash::make($row[__('password')]),
            'active' => 1,
            'school_id'      => auth()->user()->school->id,
            'stream_id'     => $this->getStreamId(),
            'admin_id'    => auth()->user()->id,
        ];

        $tb = create(Student::class, $student);

        $student_info = [
            'student_id'           => $tb->id,
            'religion'             => $row[__('religion')] ?? '',
            'fathers_name'          => $row[__('fathers_name')] ?? '',
            'fathers_phone_number'  => $row[__('fathers_phone_number')] ?? '',
            'fathers_national_id'   => $row[__('fathers_national_id')] ?? '',
            'fathers_occupation'    => $row[__('fathers_occupation')] ?? '',
            'fathers_designation'   => $row[__('fathers_designation')] ?? '',
            'fathers_annual_income' => $row[__('fathers_annual_income')] ?? 0,
            'mothers_name'          => $row[__('mothers_name')],
            'mothers_phone_number'  => $row[__('mothers_phone_number')] ?? '',
            'mothers_national_id'   => $row[__('mothers_national_id')] ?? '',
            'mothers_occupation'    => $row[__('mothers_occupation')] ?? '',
            'mothers_designation'   => $row[__('mothers_designation')] ?? '',
            'mothers_annual_income' => $row[__('mothers_annual_income')] ?? 0,
        ];
        
        create(StudentInfo::class, $student_info);
    }

    public function getSectionId()
    {
        if(!empty($this->class) && !empty($this->section)){
            $class_id = Myclass::bySchool(auth()->user()->school_id)->where('class_number', $this->class)->pluck('id')->first();

            $section = Section::where('class_id', $class_id)->where('section_number', $this->section)->pluck('id')->first();

            return $section;
        } else {
            return 0;
        }
    }

    public function getStreamId()
    {
        $streamId = Stream::where(['id'=>$this->northId,'school_id'=>Auth::user()->school->id])->pluck('id')->first();

        return $streamId;
    }else{
        return 0;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
