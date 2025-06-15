<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Book extends Model implements Searchable
{
    //
    use HasUuids;
    
	protected $table = 'books';
    protected $fillable = ['title','rack_no','row_no','author','units','book_id','school_id','library_id','book_genre_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.students.show', $this->id);

        return new SearchResult(
                $this,
                $this->first_name,
                $url
            );
    }

    public function book_genre(): BelongsTo
    {
    	return $this->belongsTo('App\Models\BookGenre')->withDefault();
    }

    public function library(): BelongsTo
    {
        return $this->belongsTo('App\Models\Library')->withDefault();
    }

    public function school(): BelongsTo
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function stream(): BelongsTo
    {
        return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function issuedbooks(): HasMany
    {
        return $this->hasMany('App\Models\Issuedbook', 'book_id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','book_genre','library','issuedbooks')->latest('id');
    }

    public function getIssuedBooksAttribute()
    {
        $issuedBooks = $this->issuedbooks()->where(['book_id'=>$this->id,'returned'=>false])->with('book')->get();

        return $issuedBooks;
    }

    public function getIssuedBooksCountAttribute()
    {
        $issuedBooksCount = $this->issued_books->count();

        return $issuedBooksCount;
    }

    public function getAvailableBooksAttribute()
    {
        $countIssuedBooks = $this->issued_books_count;
        $availableBooks = $this->units - $countIssuedBooks;

        return $availableBooks;
    }

    public function title(): Attribute 
    {               
        return  new Attribute(                                                           
            set: fn ($value) => ucwords($value),                
        ); 
    }

    public function author(): Attribute 
    {               
        return  new Attribute(                                                           
            set: fn ($value) => ucwords($value),                
        ); 
    }
}
