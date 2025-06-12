<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = [
        'user_id',
        'status',
        'title',
        'description',
        'location',
        'date',
        'time',
        'gender',
        'members_count'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banner')->singleFile();
    }

}
