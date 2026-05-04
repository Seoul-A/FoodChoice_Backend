<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\RecommendationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecommendationController extends Controller
{
    public function index(Request $request)
    {
        $user   = $request->user();
        $tagIds = $user->favoriteTags()->pluck('tags.id');

        if ($tagIds->isEmpty()) {
            $foods = Food::available()->with('tags')->popular()->paginate(12);

            return response()->json([
                'foods'     => $foods,
                'type'      => 'popular',
                'message'   => 'Menu Teratas',
            ]);
        }

        $foods = Food::available()
            ->with('tags')
            ->withCount(['tags as match_count' => function ($q) use ($tagIds) {
                $q->whereIn('tags.id', $tagIds);
            }])
            ->having('match_count', '>', 0)
            ->orderByDesc('match_count')
            ->orderByDesc('likes_count')
            ->paginate(12);

        $userId = $user->id;
        $foods->getCollection()->transform(function ($food) use ($userId) {
            $food->isLiked = $food->isLikedBy($userId);
            return $food;
        });

        $logData = $foods->getCollection()->map(fn($f)  => [
            'user_id' => $userId,
            'food_id' => $f->id,
            'shown_at' => now(),
        ])->toArray();
        RecommendationLog::insert($logData);

        return response()->json([
            'foods'     => $foods,
            'type'      => 'personalized',
            'message'   => 'Rekomendasi untuk kamu',
        ]);
    }
}
