<?php

namespace App\Models;

use App\Models\GradeSystem;
use App\Models\ImageGallery;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    protected $fillable = ['name','description'];

    public function grade_systems(): HasMany
    {
    	return $this->hasMany(GradeSystem::class,'section_id','id');
    }

    public function image_galleries(): HasMany
    {
        return $this->hasMany(ImageGallery::class,'section_id','id');
    }
}
