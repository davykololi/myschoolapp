<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return Student::with('stream','school','dormitory')->get();
    }

    public function headings(): array
    {
    	return [
    			'NAME',
    			'ADM NO',
    			'CLASS',
    			'PHONE',
    			'DORMITORY',
    			'EMAIL',
    		];
    }

    public function map($student): array
    {
        return [
            $student->full_name,
            $student->admission_no,
            $student->stream->name,
            $student->phone_no,
            $student->dormitory->name,
            $student->email,
         ];
    }
}
