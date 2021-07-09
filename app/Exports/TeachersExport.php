<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class TeachersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Teacher::with('school','position_teacher')->get();
    }

    public function headings(): array
    {
    	return [
    			'NAME',
    			'PHONE',
    			'ADDRESS',
    			'EMAIL',
    			'ROLE',
    		];
    }

    public function map($teacher): array
    {
        return [
            $teacher->full_name,
            $teacher->phone_no,
            $teacher->postal_address,
            $teacher->email,
            $teacher->position_teacher->name,
         ];
    }
}
