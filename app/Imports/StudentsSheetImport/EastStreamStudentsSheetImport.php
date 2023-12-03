<?php

namespace App\Imports\StudentsSheetImport;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class EastStreamStudentsSheetImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
}
