<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class IssuedBook extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'issued_books';
    protected $casts =['created_at' =>"datetime:d-m-Y\TH:iPZ",'updated_at' =>"datetime:d-m-Y\TH:iPZ",'issued_at' =>"datetime:d-m-Y\TH:iPZ",'return_at' =>"datetime:d-m-Y\TH:iPZ",];
    protected $fillable = ['issued_date','return_date','returned','student_id','book_id','returned_status','recommentation','serial_no'];

    protected $appends = ['converted_issued_date','converted_return_date'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function book(): BelongsTo
    {
        return $this->belongsTo('App\Models\Book')->withDefault();
    }

    public function student(): BelongsTo
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
        $convertedReturnDate = Carbon::createFromFormat('d/m/Y',$this->return_date)->format('Y-m-d H:i:s');
        $newReturnDate = Carbon::parse($convertedReturnDate);

        return $newReturnDate;
    }

    public function getTimeDifferenceAttribute()
    {
        $timeDifference = $this->converted_issued_date->diffForHumans($this->converted_return_date);

        return $timeDifference;
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('student.user','book','student.stream');
    }

    public function setAttendanceDateAttribute($value)
    {
        $this->attributes['attendance_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getAttendanceDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');

    }

    public function getPresentAttribute($value)
    {
        return Arr::get(AppHelper::ATTENDANCE_TYPE, $value);
    }

    public function scopeTimeElapsed($query) 
    {
        $currentDate = Carbon::now();
        $ty = $currentDate->format('d/m/Y');

        return $query->where('return_date','<',$ty);
    }

    public function scopeIssuedBetween($query,$startDate,$endDate) 
    {
        return $query->whereBetween('issued_date',[$startDate,$endDate]);
    }
}
