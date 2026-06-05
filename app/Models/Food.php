<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'name', 'description', 'image_url',
        'price', 'likes_count', 'is_available', 'created_by',
    ];

    protected function casts(): array
    {
        return [
            'is_available' => 'boolean',
            'price' => 'decimal:0',
            'likes_count' => 'integer',
        ];
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'food_tags');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    // FOOD LIKES

    public function likes()
    {
        return $this->hasMany(FoodLike::class);
    }

    public function isLikedBy(int $userId): bool
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    public function toggleLike(int $userId): bool
    {
        $existing = $this->likes()->where('user_id', $userId)->first();

        if ($existing) {
            $existing->delete();
            $this->decrement('likes_count');
            return false;
        }

        $this->likes()->create(['user_id' => $userId]);
        $this->increment('likes_count');
        return true;
    }

    public function scopePopular($query)
    {
        return $query->orderBy('likes_count', 'desc');
    }
}
