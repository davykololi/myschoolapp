<?php

namespace App\Exports;

use App\Models\Stream;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class StreamTeachersExport implements FromCollection, WithHeadings, WithMapping ,ShouldAutoSize
{
    use Exportable;
    protected $stream;

    public function __construct(Stream $stream)
    {
        $this->stream = $stream;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->stream->teachers()->with('school','standard_subject')->get();
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

    public function map($teacher): array
    {
        return [
            $teacher->full_name,
            $teacher->phone_no,
            $teacher->email,
            $teacher->standard_subject->subject->name,
         ];
    }
}
