<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Request $request, $id)
    {
        $food = Food::findOrFail($id);
        $isLiked = $food->toggleLike($request->user()->id);

        return response()->json([
            'message'   => $isLiked ? 'Makanan disukai' : 'Like dibatalkan',
            'is_liked'  => $isLiked,
            'likes_count' => $food->fresh()->likes_count,
        ]);
    }
}
