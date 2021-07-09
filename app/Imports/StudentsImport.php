<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            //
            'full_name' => $row[0],
            'email' => $row[1],
            'dob' => $row[2],
            'postal_address' => $row[3],
            'school_id' => $row[4],
            'stream_id' => $row[5],
            'intake_id' => $row[6],
            'dormitory_id' => $row[7],
            'admin_id' => $row[8],
            'admission_no' => $row[9],
            'image' => $row[10],
            'phone_no' => $row[11],
            'password' => $row[12],
        ]);
    }
}
