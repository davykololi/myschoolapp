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
        return $this->stream->stream_subjects()->eagerLoaded()->get();
    }

    public function headings(): array
    {
        return [
                'NO',
                'NAME',
                'PHONE',
                'EMAIL',
                'SUBJECT',
            ];
    }

    public function map($standardSubject): array
    {
        return [
            $standardSubject->id,
            $standardSubject->teacher->user->full_name,
            $standardSubject->teacher->phone_no,
            $standardSubject->teacher->user->email,
            $standardSubject->subject->name,
         ];
    }
}
