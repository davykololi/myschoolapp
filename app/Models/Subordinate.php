<?php

namespace App\Models;

use Carbon\Carbon;
use	Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use App\Enums\SubordinatePositionEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommonUserInformation;

class Subordinate extends CommonUserInformation implements Searchable
{
    use Notifiable;
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'subordinates';
    protected $casts = ['created_at' => 'datetime:d-m-Y H:i','position'=> SubordinatePositionEnum::class];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.staffs.show', $this->id);

        return new SearchResult(
                $this,
                $this->full_name,
                $url,
            );
    }

    public function departments(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Department')->withTimestamps();
    }

    public function clubs(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Club')->withTimestamps();
    }

    public function assignments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','departments','meetings','rewards','clubs','assignments','user')->get();
    }

    public function schoolSecretary()
    {
        return $this->position === SubordinatePositionEnum::SS;
    }

    public function seniorCook()
    {
        return $this->position === SubordinatePositionEnum::SC;
    }

    public function ordinaryCook()
    {
        return $this->position === SubordinatePositionEnum::OC;
    }

    public function seniorSecurity()
    {
        return $this->position === SubordinatePositionEnum::SSCRTY;
    }

    public function ordinarySecurity()
    {
        return $this->position === SubordinatePositionEnum::OSCRTY;
    }

    public function schoolGardener()
    {
        return $this->position === SubordinatePositionEnum::GDNR;
    }

    public function schoolElectrician()
    {
        return $this->position === SubordinatePositionEnum::SE;
    }

    public function teaServer()
    {
        return $this->position === SubordinatePositionEnum::TS;
    }
}
