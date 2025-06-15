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
        return Issuedbook::with('book','student.user','student.stream')->get();
    }

    public function headings(): array
    {
        return [
                'NAME',
                'CLASS',
                'BOOK TITLE',
                'SERIAL NO',
                'ISSUED DATE',
                'RETURN DATE',
            ];
    }

    public function map($issuedBook): array
    {
        return [
            $issuedBook->student->user->full_name,
            $issuedBook->student->stream->name,
            $issuedBook->book->title,
            $issuedBook->serial_no,
            $issuedBook->issued_date,
            $issuedBook->return_date,
         ];
    }
}
