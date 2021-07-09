<?php

namespace App\Imports;

use App\Models\Report;
use\Maatwebsite\Excel\Concerns\WithHeadingRow;
use\Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\ToModel;

class ReportsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Report([
            //
            'name' => $row[0],
            'maths_mark' => $row[1],
            'english_mark' => $row[2],
            'kisw_mark' => $row[3],
            'science_mark' => $row[4],
            'cre_mark' => $row[5],
            'recommendation' => $row[7],
        ]);
    }
}
