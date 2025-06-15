<?php

namespace App\Imports\LibraryBooksImport;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class LibraryBooksExelSheetImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading,WithUpserts
{
    protected $libraryId, $bookGenreId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($libraryId,$bookGenreId)
    {
        $this->libraryId = $libraryId;
        $this->bookGenreId = $bookGenreId;
    }

    public function uniqueBy()
    {
        return 'book_id';
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            //
            'title' => $row['title'],
            'rack_no' => $row['rack_no'],
            'row_no' => $row['row_no'],
            'author' => $row['author'],
            'units' => $row['units'],
            'book_id' => $row['book_id'],
            'school_id' => auth()->user()->school->id,
            'library_id' => $this->libraryId,
            'category_book_id' => $this->bookGenreId,
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
