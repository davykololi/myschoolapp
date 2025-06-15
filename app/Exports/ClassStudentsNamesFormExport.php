<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClassStudentsNamesFormExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
	use Exportable;
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return $this->class->students()->with('user')->get();
    }

    public function headings(): array
    {
    	return [
    			'NAME',
                'ADMISSION NO'
    		];
    }

    public function map($student): array
    {
        return [
            $student->user->full_name,
            $student->admission_no,
         ];
    }
}
