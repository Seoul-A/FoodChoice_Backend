<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function index(Request $request)
    {
        $tags = $request->user()->favoriteTags()->get();

        return response()->json([
            'preferences' => $tags,
        ]);
    }

    public function onboarding(Request $request)
    {
        $request->validate([
            'tag_ids'   => 'required|array|min:3',
            'tag_ids.*' => 'exists:tags,id',
        ], [
            'tag_ids.min'      => 'Pilih minimal 3 kategori makanan favoritmu.',
            'tag_ids.required' => 'Kamu harus memilih minimal 3 kategori.',
        ]);

        $user = $request->user();
        $user->favoriteTags()->sync($request->tag_ids);
        $user->update(['is_onboarded' => true]);

        return response()->json([
            'message'   => 'Preferensi berhasil disimpan',
            'preferences' => $user->favoriteTags()->get(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'tag_ids'   => 'required|array|min:3',
            'tag_ids.*' => 'exists:tags,id',
        ]);

        $request->user()->favoriteTags()->sync($request->tag_ids);

        return response()->json([
            'message'       => 'Preferensi diperbarui',
            'preferences'   => $request->user()->favoriteTags()->get(),
        ]);
    }
}
