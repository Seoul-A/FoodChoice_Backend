<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:tags,name',
            'type' => 'required|in:tipe,jenis,rasa,bahan_utama',
        ]);

        $tag = Tag::create($request->only(['name', 'type']));

        return response()->json([
            'message' => 'Tag berhasil ditambahkan',
            'data' => $tag,
        ], 201);
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return response()->json([
            'message' => 'Tag berhasil dihapus',
        ]);
    }
}