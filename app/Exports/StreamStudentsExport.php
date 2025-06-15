<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class StreamStudentsExport implements FromCollection, WithHeadings, WithMapping ,ShouldAutoSize
{
	use Exportable;
    protected $stream;

	public function __construct($stream)
	{
		$this->stream = $stream;
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return $this->stream->students()->eagerLoaded()->get();
    }

    public function headings(): array
    {
        return [
                'NO',
                'NAME',
                'ADM NO',
                'PHONE',
                'DORMITORY',
                'EMAIL',
            ];
    }

    public function map($student): array
    {
        return [
            $student->id,
            $student->user->full_name,
            $student->admission_no,
            $student->phone_no,
            $student->dormitory->name,
            $student->user->email,
         ];
    }
}
