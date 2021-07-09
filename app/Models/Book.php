<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Book extends Model implements Searchable
{
    //
	protected $table = 'books';
    protected $fillable = ['title','rack_no','author','units','school_id','library_id','category_book_id',];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.students.show', $this->id);

        return new SearchResult(
                $this,
                $this->first_name,
                $url
            );
    }

    public function category_book()
    {
    	return $this->belongsTo('App\Models\CategoryBook')->withDefault();
    }

    public function library()
    {
        return $this->belongsTo('App\Models\Library')->withDefault();
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function stream() {
        
        return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function issuedbook() {

        return $this->hasMany('App\Models\Issuedbook', 'book_id');
    }
}
