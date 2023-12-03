<?php

namespace App\Exports;

use App\Models\Issuedbook;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class IssuedBooksExport implements FromCollection, WithHeadings, WithMapping ,ShouldAutoSize
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Issuedbook::with('student')->get();
    }

    public function headings(): array
    {
        return [
                'NAME',
                'CLASS',
                'BORROWED BOOK',
                'SERIAL NO',
                'BORROWED DATE',
                'RETURN DATE',
            ];
    }

    public function map($booker): array
    {
        return [
            $booker->student->full_name,
            $booker->student->standard->name,
            $booker->book->title,
            $booker->serial_no,
            \Carbon\Carbon::parse($booker->issued_date)->format('d-m-Y'),
            \Carbon\Carbon::parse($booker->return_date)->format('d-m-Y'),
         ];
    }
}
