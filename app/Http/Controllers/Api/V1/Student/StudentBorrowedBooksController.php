<?php

namespace App\Http\Controllers\Api\V1\Student;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentBorrowedBooksController extends Controller
{
    public function borrowedBooks()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $borrowedBooks = $user->student->issued_books;
            $title = "Borrowed Books";
            
            $data = [
                'user'=>$user,
                'borrowedBooks'=>$borrowedBooks,
                'title'=>$title,
            ];
            return json([$data]);
        }  
    }
}
