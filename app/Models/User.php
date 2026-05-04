<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_onboarded',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'password'      => 'hashed',
            'is_onboarded'  => 'boolean',
        ];
    }

    const ROLE_ADMIN = 'admin';

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function preferences()
    {
        return $this->hasMany(UserPreference::class);
    }

    public function favoriteTags()
    {
        return $this->belongsToMany(Tag::class, 'user_preferences')
                    ->withTimestamps();
    }

    public function recommendationLogs()
    {
        return $this->hasMany(RecommendationLog::class);
    }

    // FOOD LIKES

    public function likedFoods()
    {
        return $this->belongsToMany(Food::class, 'food_likes')
                    ->withTimestamps();
    }
}
