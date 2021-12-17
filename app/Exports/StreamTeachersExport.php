<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class StreamTeachersExport implements FromCollection, WithHeadings, WithMapping ,ShouldAutoSize
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
        return $this->stream->standard_subjects()->with('school','teacher')->get();
    }

    public function headings(): array
    {
        return [
                'NAME',
                'PHONE',
                'EMAIL',
                'SUBJECT',
            ];
    }

    public function map($standardSubject): array
    {
        return [
            $standardSubject->teacher->full_name,
            $standardSubject->teacher->phone_no,
            $standardSubject->teacher->email,
            $standardSubject->subject->name,
         ];
    }
}
