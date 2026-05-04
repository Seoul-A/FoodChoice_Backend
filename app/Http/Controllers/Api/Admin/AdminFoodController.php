<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class AdminFoodController extends Controller
{
    public function index()
    {
        $foods = Food::with('tags')->latest()-paginate(12);
        return response()->json($foods);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'image_url'     => 'nullable|url',
            'is_available'  => 'boolean',
            'tags_ids'      => 'required|array|min:1',
            'tags_ids.*'    => 'exists:tags,id',
        ]);

        $foods = Food::create([
            ...$data,
            'created_by' => $request->user()->id,
        ]);

        $foods->tags()->sync($data['tags_ids']);

        return response()->json([
            'message'   => 'Makanan berhasil ditambahkan',
            'food'      => $foods->load('tags'),
        ]);
    }

    public function update(Request $request, $id)
    {
        $food = Food::findOrFail($id);

        $data = $request->validate([
            'name'         => 'string|max:255',
            'description'  => 'nullable|string',
            'image_url'    => 'nullable|url',
            'is_available' => 'boolean',
            'tag_ids'      => 'array',
            'tag_ids.*'    => 'exists:tags,id',
        ]);

        $food->update(Arr::except($data, ['tag_ids']));

        if ($request->has('tag_ids')) {
            $food->tags()->sync($data['tag_ids']);
        }

        return response()->json([
            'message'   => 'Makanan berhasil diperbarui',
            'food'      => $food->load('tags'),
        ]);
    }

    public function destroy($id)
    {
        Food::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Makanan berhasil dihapus',
        ]);
    }
}
