<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::active()
            ->orderBy('type')
            ->orderBy('name')
            ->get();

        $grouped = $tags->groupBy('type');

        $userTagIds = $request->user()->favoriteTags()->pluck('tags.id');

        return response()->json([
            'tags'          => $tags,
            'grouped'       => $grouped,
            'user_tags_ids' => $userTagIds,
        ]);
    }
}
