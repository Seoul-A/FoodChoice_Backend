<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_tags');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_preferences');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
