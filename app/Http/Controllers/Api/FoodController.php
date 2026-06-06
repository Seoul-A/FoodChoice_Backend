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
        // Filter by tags
        if ($request->filled('tag_ids')) {
            $tagIds = explode(',', $request->tag_ids);
            $query->whereHas('tags', fn($q)  =>
                $q->whereIn('tags.id', $tagIds)
            );
        }

        //filter by tipe makanan (makanan berat, makanan ringan, minuman)
        if ($request->filled('tipe')) {
            $query->whereHas(
                'tags',
                function ($q)
                use ($request) {

                    $q->where(
                        'type',
                        'tipe'
                    )
                    ->whereIn(
                        'name',
                        $request->tipe
                    );
                }
            );
        }

        //filter by jenis makanan (makanan favorit, makanan baru, makanan terpopuler)
        if ($request->filled('jenis')) {

            $query->whereHas(
                'tags',
                function ($q)
                use ($request) {

                    $q->where(
                        'type',
                        'jenis'
                    )
                    ->whereIn(
                        'name',
                        $request->jenis
                    );
                }
            );
        }

        //filter by rasa makanan (pedas, manis, asin, asam)
        if ($request->filled('rasa')) {

            $query->whereHas(
                'tags',
                function ($q)
                use ($request) {

                    $q->where(
                        'type',
                        'rasa'
                    )
                    ->whereIn(
                        'name',
                        $request->rasa
                    );
                }
            );
        }
        
        //filter by bahan makanan (ayam, daging, sayur, buah)
        if ($request->filled('bahan_utama')) {

            $query->whereHas(
                'tags',
                function ($q)
                use ($request) {

                    $q->where(
                        'type',
                        'bahan_utama'
                    )
                    ->whereIn(
                        'name',
                        $request->bahan_utama
                    );
                }
            );
        }

        // Search by name
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

