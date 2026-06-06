<?php

namespace App\Http\Controllers\Api\Admin;
use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdminFoodController extends Controller
{
    public function index()
    {
        $foods = Food::with('tags')
            ->latest()
            ->paginate(12);

        return response()->json($foods);
    }

    public function show($id)
    {
        $food = Food::with('tags')
            ->findOrFail($id);

        return response()->json($food);
    }

    public function store(Request $request)
    {
        $request->merge([
            'tags_ids' =>
                json_decode(
                    $request->tags_ids,
                    true
                )
        ]);    

        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'image'     => 'required|mimetypes:image/svg+xml|max:20048',
            'is_available'  => 'nullable|boolean',
            'tags_ids'      => 'required|array|min:1',
            'tags_ids.*'    => 'exists:tags,id',
        ]);

        $fileName =
            time() . '_' .
            $request
            ->file('image')
            ->getClientOriginalName();

        $request
            ->file('image')
            ->move(
                public_path(
                    'image/makanan'
                ),
                $fileName
            );

        $food = Food::create([
            'name'          => $data['name'],
            'description'   => '',
            'image_url'     => 'image/makanan/' . $fileName,
            'is_available'  => filter_var($request->is_available,FILTER_VALIDATE_BOOLEAN),
            'created_by'    => $request->user()->id,
        ]);

        $food->tags()->sync($data['tags_ids']);

        return response()->json([
            'message'   => 'Makanan berhasil ditambahkan',
            'food'      => $food->load('tags'),
        ]);
    }

    public function update(Request $request, $id)
    {
        $food = Food::findOrFail($id);

        $data = $request->validate([
            'name'         => 'sometimes|string|max:255',
            'description'  => 'nullable|string',
            'image_url'    => 'nullable|string',
            'is_available' => 'boolean',
            'tags_ids'     => 'array',
            'tags_ids.*'   => 'exists:tags,id',
        ]);

        $food->update(
            Arr::except($data, ['tags_ids'])
        );

        if(isset($data['tags_ids'])){

            $food->tags()->sync(
                $data['tags_ids']
            );

        }

        return response()->json([
            'message' => 'Makanan berhasil diperbarui',
            'food' => $food->load('tags'),
        ]);
    }

    public function destroy($id)
    {
        $food = Food::findOrFail($id);

        $food->delete();

        return response()->json([
            'message' => 'Makanan berhasil dihapus',
        ]);
    }
}