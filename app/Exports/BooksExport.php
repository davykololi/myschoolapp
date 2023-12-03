<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class BooksExport implements FromCollection, WithHeadings, WithMapping ,ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return Book::with('school','library')->get();
    }

    public function headings(): array
    {
    	return [
    			'TITLE',
    			'AUTHOR',
                'LIBRARY',
                'RACK NO',
    			'UNITS',
    		];
    }

    public function map($book): array
    {
        return [
            $book->title,
            $book->author,
            $book->library->name,
            $book->rack_no,
            $book->units,
         ];
    }
}
