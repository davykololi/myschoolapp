<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class StreamMarksExport implements FromCollection, WithHeadings, WithMapping ,ShouldAutoSize
{
	use Exportable;
	protected $marks;
	public function __construct($marks)
	{
		$this->marks = $marks;
	}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return $this->marks;
    }

    public function headings(): array
    {
        return [
                'NAME',
                'MATHEMATICS',
                'ENGLISH',
                'KISWAHILI',
                'CHEMISTRY',
                'BIOLOGY',
                'PHYSICS',
                'CRE',
                'ISLAM',
                'HISTORY',
                'GEOGRAPHY',
            ];
    }

    public function map($mark): array
    {
        return [
            $mark->name,
            $mark->mathematics,
            $mark->english,
            $mark->kiswahili,
            $mark->chemistry,
            $mark->biology,
            $mark->physics,
            $mark->cre,
            $mark->islam,
            $mark->history,
            $mark->geography,
         ];
    }
}
