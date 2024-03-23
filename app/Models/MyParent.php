<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Notifications\ParentResetPasswordNotification;

class MyParent extends Model implements Searchable
{
    use HasFactory, Notifiable;
    /**
    * The attributes that are mass assignable.
    *@var array
    */
    protected $table = 'parents';
    protected $fillable = ['image','gender','id_no','phone_no','current_address','permanent_address','is_banned','lock','user_id','school_id'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ParentResetPasswordNotification($token));
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.parents.show', $this->id);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
    }

    public function user() 
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function school() 
    {
        return $this->belongsTo(School::class)->withDefault();
    }

    public function meetings(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Meeting')->withTimestamps();
    }

    public function rewards(): BelongsToMany
    {
    	return $this->belongsToMany('App\Models\Reward')->withTimestamps();
    }

    public function children(): HasMany
    {
        return $this->hasMany('App\Models\Student','parent_id','id');
    }

    public function getImageUrlAttribute()       
    { 
        return URL::asset('/storage/storage/'.$this->image);   
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('children','user');
    }
}
