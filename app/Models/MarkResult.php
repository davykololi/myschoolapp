<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkResult extends Model
{
    use HasFactory;

    protected $table = 'mark_results';
    protected $fillable = ['student_name', 'maths'];
}
