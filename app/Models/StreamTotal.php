<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StreamTotal extends Model
{
    use HasFactory;
    protected $table = 'stream_totals';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = ['name','mark_total','index_no'];
}
