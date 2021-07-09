<?php

namespace App\Imports;

use App\Models\Mark;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClassMarkSheetImport implements ToModel,WithHeadingRow
{
    protected $yearId;
    protected $termId;
    protected $classId;
    protected $examId;
    protected $teacherId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$classId,$examId,$teacherId)
    {
        $this->yearId = $yearId;
        $this->termId = $termId;
        $this->classId = $classId;
        $this->examId = $examId;
        $this->teacherId = $teacherId;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mark([
            //
            'name' => $row['name'],
            'mathematics' => $row['maths'],
            'english' => $row['eng'],
            'kiswahili' => $row['kisw'],
            'chemistry' => $row['chem'],
            'biology' => $row['bio'],
            'physics' => $row['physics'],
            'cre' => $row['cre'],
            'islam' => $row['islam'],
            'history' => $row['hist'],
            'ghc' => $row['ghc'],
            'year_id' => $this->yearId,
            'term_id' => $this->termId,
            'class_id' => $this->classId,
            'exam_id' => $this->examId,
            'teacher_id' => $this->teacherId,
        ]);
    }
}
