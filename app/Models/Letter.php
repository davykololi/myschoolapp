<?php

namespace App\Models;

use App\Models\School;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;
    protected $table = 'letters';
    protected $fillable = ['content','school_id'];
    const EXCERPT_LENGTH = 100;

    public function school()
    {
    	return $this->belongsTo(School::class)->withDefault();
    }

    public function excerpt()
    {
        return Str::limit(strip_tags($this->content),Letter::EXCERPT_LENGTH);
    }
}
