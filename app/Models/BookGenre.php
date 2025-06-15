<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class BookGenre extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'book_genres';
    
    protected $fillable = ['name','desc','slug'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function books(): HasMany
    {
        return $this->hasMany('App\Models\Book','book_genre_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('books');
    }
}
