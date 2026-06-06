<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $query = Food::available()->with('tags');

        if ($request->filled('tag_ids')) {
            $tagIds = explode(',', $request->tag_ids);
            $query->whereHas('tags', fn($q)  =>
                $q->whereIn('tags.id', $tagIds)
            );
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $sort = $request->get('sort', 'popular');
        match ($sort) {
            'popular'  => $query->popular(),
            'newest'   => $query->latest(),
            default    => $query->popular(),
        };


        $foods = $query->paginate(12);

        $userId = $request->user()->id;

        if ($foods instanceof \Illuminate\Pagination\LengthAwarePaginator) {

            $foods->getCollection()
            ->transform(function ($food) use ($userId) {

                $food->is_liked =
                    $food->isLikedBy($userId);

                return $food;
            });

        } else {

            $foods->transform(function ($food) use ($userId) {

                $food->is_liked =
                    $food->isLikedBy($userId);

                return $food;
            });
        }
        return response()->json($foods);
    }

    public function show(Request $request, $id)
    {
        $food = Food::available()
            ->with('tags')
            ->findOrFail($id);

        $food->is_liked = $food->isLikedBy($request->user()->id);

        return response()->json([
            'food'  => $food,
        ]);
    }

   public function spinnerFoods()
    {
        $foods = Food::available()
            ->with('tags')
            ->get();

        return response()->json([
            'foods' => $foods
        ]);
    }
}

