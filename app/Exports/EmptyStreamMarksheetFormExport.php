<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmptyStreamMarksheetFormExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
	use Exportable;
    protected $stream, $exam;

    public function __construct($stream,$exam)
    {
        $this->stream = $stream;
        $this->exam = $exam;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return $this->stream->students()->with('user')->get();
    }

    public function headings(): array
    {
    	return [
    			'NAME',
    			'ADMISSION NO',
    			'EXAM NO',
    			'MATHS',
    			'ENG',
    			'KISW',
                'CHEM',
                'BIO',
                'PHYSICS',
                'CRE',
                'ISLAM',
                'HIST',
                'GEOG'
    		];
    }

    public function map($student): array
    {
        $stream = $this->stream;
        $exam = $this->exam;
        return [
            $student->user->full_name,
            $student->admission_no,
            $stream->class->initials."/".$stream->stream_section->initials."/".$exam->initials."/".$student->admission_no."/".date("Y"),
         ];
    }
}
