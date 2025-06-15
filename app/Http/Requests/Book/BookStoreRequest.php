<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'rack_no' => 'required|integer',
            'row_no' => 'required|integer',
            'author' => 'required|string',
            'units' => 'required|integer',
            'library_id' => 'required|exists:libraries,id',
            'category_book_id' => 'required|exists:category_books,id',
        ];
    }

    public function messages()
    {

        return [
                //
                'title.required' => 'The title is required',
                'rack_no.required' => 'The rack number is required',
                'row_no.required' => 'The row number is required',
                'author.required' => 'The name of the author is required',
                'units.required' => 'The number of available units is required',
                'library_id.required' => 'The name of the library is required',
                'category_book_id.required' => 'The category the book belongs to is required',   
            ];
    }
}
