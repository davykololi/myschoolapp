<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssuedBook extends Model
{
    use HasFactory;

    protected $table = 'issued_books';
    protected $casts =['created_at' =>"datetime:d-m-Y\TH:iPZ",'updated_at' =>"datetime:d-m-Y\TH:iPZ",'issued_at' =>"datetime:d-m-Y\TH:iPZ",'return_at' =>"datetime:d-m-Y\TH:iPZ",];
    protected $fillable = ['issued_date','return_date','returned','student_id','book_id','returned_status','recommentation','serial_no'];

    public function book()
    {
        return $this->belongsTo('App\Models\Book')->withDefault();
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student')->withDefault();
    }

    public function issuedDate()
    {
        $issuedDate = $this->issued_date;

        return $issuedDate;
    }

    public function returnDate()
    {
        $returnDate = $this->return_date;

        return $returnDate;
    }
}
