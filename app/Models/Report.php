<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model implements Searchable
{
    use HasFactory;

    protected $table = 'reports';
    public $incrementing = false; 
    protected $fillable = ['name','maths_mark','english_mark','kisw_mark','science_mark','cre_mark','recommendation','school_id','class_id','stream_id','teacher_id','term_id','year_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.reports.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School')->withDefault();
    }

    public function class()
    {
        return $this->belongsTo('App\Models\MyClass')->withDefault();
    }

    public function stream()
    {
        return $this->belongsTo('App\Models\Stream')->withDefault();
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher')->withDefault();
    }
}
