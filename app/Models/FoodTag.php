<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FoodTag extends Pivot
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'food_tags';

    protected $fillable = ['food_id', 'tag_id'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
