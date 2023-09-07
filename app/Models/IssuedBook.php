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

    public function getConvertedIssuedDateAttribute()
    {
        $convertedIssuedDate = Carbon::createFromFormat('d/m/Y',$this->issued_date)->format('Y-m-d');
        $newIssuedDate = Carbon::parse($convertedIssuedDate);

        return $newIssuedDate;
    }

    public function getConvertedReturnDateAttribute()
    {
        $convertedReturnDate = Carbon::createFromFormat('d/m/Y',$this->return_date)->format('Y-m-d');
        $newReturnDate = Carbon::parse($convertedReturnDate);

        return $newReturnDate;
    }

    public function getTimeDifferenceAttribute()
    {
        $timeDifference = $this->converted_issued_date->diffForHumans($this->converted_return_date);

        return $timeDifference;
    }
}
