<?php

namespace App\Models;

use App\Enums\AdminPositionEnum;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use	Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommonUserInformation;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Admin extends CommonUserInformation
{
    use Notifiable, HasUuids;
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'admins';
    
    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;
    
    protected $casts = ['created_at' => 'datetime:d-m-Y H:i','position'=> AdminPositionEnum::class];

    public function students(): HasMany
    {
        return $this->hasMany('App\Models\Student','admin_id','id');
    }

    public function teachers(): HasMany
    {
        return $this->hasMany('App\Models\Teacher','admin_id','id');
    }

    public function assignments(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Assignment')->withTimestamps();
    }

    public function seniorAdmin()
    {
        return $this->position === AdminPositionEnum::SA;
    }

    public function deputySeniorAdmin()
    {
        return $this->position === AdminPositionEnum::DSA;
    }

    public function studentRegistrar()
    {
        return $this->position === AdminPositionEnum::SR;
    }

    public function examRegistrar()
    {
        return $this->position === AdminPositionEnum::ER;
    }

    public function academicRegistrar()
    {
        return $this->position === AdminPositionEnum::AR;
    }

    public function ordinayAdmin()
    {
        return $this->position === AdminPositionEnum::OA;
    }

    public function accountsAdmin()
    {
        return $this->position === AdminPositionEnum::ACAD;
    }

    public function libraryAdmin()
    {
        return $this->position === AdminPositionEnum::LIBAD;
    }

    public function dataOfficer()
    {
        return $this->position === AdminPositionEnum::DATOFF;
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class,'admin_id','id');
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','user');
    }
}
