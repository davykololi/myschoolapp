<?php

namespace App\Models;

use App\Models\School;
use App\Models\Admin;
use App\Models\Section;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class ImageGallery extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'image_galleries';
    protected $fillable = ['title','description','slug','image','keywords','is_published','admin_id','school_id','section_id'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class)->withDefault();
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class)->withDefault();
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class)->withDefault();
    }

    public function getImageUrlAttribute()       
    { 
        return URL::asset('/storage/storage/'.$this->image);   
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','admin','section');
    }
}
