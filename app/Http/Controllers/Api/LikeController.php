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

    public function history(
        Request $request
    ){
        $query =
            Food::with('tags')
            ->whereHas(
                'likes',
                function($q)
                use ($request){

                    $q->where(
                        'user_id',
                        $request
                        ->user()
                        ->id
                    );
                }
            );

        // SEARCH
        if(
            $request->filled(
                'search'
            )
        ){

            $query->where(
                'name',
                'like',
                '%'
                .
                $request->search
                .
                '%'
            );
        }

        $foods =
            $query
            ->latest()
            ->paginate(12);

        $foods
        ->getCollection()
        ->transform(
            function($food){

                $food
                ->is_liked =
                true;

                return $food;
            }
        );

        return response()
        ->json(
            $foods
        );
    }
}
