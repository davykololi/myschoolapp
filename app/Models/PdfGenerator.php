<?php

namespace App\Models;

use App\Models\School;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PdfGenerator extends Model
{
    use HasFactory;
    protected $table = 'pdf_generators';
    protected $fillable = ['content','school_id'];
    const EXCERPT_LENGTH = 100;

    public function school(): BelongsTo
    {
    	return $this->belongsTo(School::class)->withDefault();
    }

    public function excerpt()
    {
        return Str::limit(strip_tags($this->content),PdfGenerator::EXCERPT_LENGTH);
    }
}
