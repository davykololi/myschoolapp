<?php

namespace App\Models;

use App\Enums\MatronPositionEnum;
use	Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\CommonUserInformation;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Matron extends CommonUserInformation
{
    use HasFactory, Notifiable, HasUuids;
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'matrons';
    protected $casts = ['created_at' => 'datetime:d-m-Y H:i','position'=> MatronPositionEnum::class];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function seniorMatron()
    {
        return $this->position === MatronPositionEnum::SM;
    }

    public function deputySeniorMatron()
    {
        return $this->position === MatronPositionEnum::ASM;
    }

    public function ordinaryMatron()
    {
        return $this->position === MatronPositionEnum::OM;
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','meetings','awards','user');
    }
}
