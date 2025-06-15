<?php

namespace App\Models;

use App\Models\GradeSystem;
use App\Models\ImageGallery;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids as HasUuids;

class Section extends Model
{
    use HasFactory, HasUuids;
    
    protected $table = 'sections';
    protected $fillable = ['name','description'];

    // Specify the primary key
    protected $primaryKey = "id";

    // Specify key type as Uuids
    protected $keyType = "string";

    // Disable auto incrementing for Uuids
    public $incrementing = false;

    public function grade_systems(): HasMany
    {
    	return $this->hasMany(GradeSystem::class,'section_id','id');
    }

    public function image_galleries(): HasMany
    {
        return $this->hasMany(ImageGallery::class,'section_id','id');
    }
}
