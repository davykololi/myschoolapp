<?php

namespace App\Models;

use App\Models\School;
use App\Models\Admin;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';
    protected $fillable = ['title','description','slug','image','keywords','is_published','admin_id','school_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class)->withDefault();
    }

    public function school()
    {
        return $this->belongsTo(School::class)->withDefault();
    }

    public function getImageUrlAttribute()       
    { 
        return URL::asset('/storage/storage/'.$this->image);   
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('school','admin')->get();
    }
}
