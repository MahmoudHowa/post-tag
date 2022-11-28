<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Profile as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'profile_users';
    protected $fillable = [
        'province',
        'user_id',
        'gender',
        'bio',
        'facebook',
    ];
    //for input this values only from DB  // in V25

    /**
     * Get the user that owns the profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    // this function for join relationship betwen the user and profile tables // in V25
}
