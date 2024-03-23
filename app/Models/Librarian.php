<?php

namespace App\Models;

use	Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Carbon\Carbon;
use App\Enums\LibrarianPositionEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommonUserInformation;

class Librarian extends CommonUserInformation implements Searchable
{
    use Notifiable;
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'librarians';
    protected $casts = ['created_at' => 'datetime:d-m-Y H:i','position'=> LibrarianPositionEnum::class];

    public function getSearchResult(): SearchResult
    {
        $url = route('superadmin.librarians.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function libraries(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Library')->withTimestamps();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','user')->get();
    }

    public function seniorLibrarian()
    {
        return $this->position === LibrarianPositionEnum::SL;
    }

    public function assistantSeniorLibrarian()
    {
        return $this->position === LibrarianPositionEnum::ASL;
    }

    public function libraryAuditor()
    {
        return $this->position === LibrarianPositionEnum::LA;
    }

    public function ordinaryLibrarian()
    {
        return $this->position === LibrarianPositionEnum::OL;
    }
}
