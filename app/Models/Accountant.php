<?php

namespace App\Models;

use App\Enums\AccountantPositionEnum;
use	Illuminate\Database\Eloquent\Casts\Attribute;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\CommonUserInformation;

class Accountant extends CommonUserInformation implements Searchable, BannableContract
{
    use HasFactory, Notifiable, Bannable;
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'accountants';
    protected $casts = ['created_at' => 'datetime:d-m-Y H:i','position'=> AccountantPositionEnum::class];

    public function getSearchResult(): SearchResult
    {
        $url = route('superadmin.accountants.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','meetings','rewards','user')->get();
    }

    public function seniorAccountant()
    {
        return $this->position === AccountantPositionEnum::SA;
    }

    public function deputySeniorAccountant()
    {
        return $this->position === AccountantPositionEnum::DSA;
    }

    public function accountsAuditor()
    {
        return $this->position === AccountantPositionEnum::AA;
    }

    public function ordinaryAccountant()
    {
        return $this->position === AccountantPositionEnum::OA;
    }
}
