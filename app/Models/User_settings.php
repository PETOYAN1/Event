<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class User_settings extends Model
{
    use HasFactory;
    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = [
        'theme',
        'email_notifications',
        'push_notifications',
        'settings'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
