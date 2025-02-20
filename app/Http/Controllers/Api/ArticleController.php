<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('user')->get();

        if ($articles->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No articles found.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Articles retrieved successfully.',
            'data' => $articles,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'created_by_user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $image = $request->file('image');
        $image->store('articles', 'public');

        $article = Article::create([
            'title' => $request->title,
            'image' => $image->hashName(),
            'description' => $request->description,
            'created_by_user_id' => $request->created_by_user_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Article created successfully',
            'data' => $article,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::with('user')->find($id);

        if (!$article) {
            return response()->json([
                'success' => false,
                'message' => 'Article not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Article retrieved successfully',
            'data' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json([
                'success' => false,
                'message' => 'Article not found',
                'data' => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'publication_date' => 'nullable|date',
            'created_by_user_id' => 'nullable|exists:users,id',
            'read_count' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $data = [
            "title" => $request->title,
            "description" => $request->description,
            "publication_date" => $request->publication_date ?? now(),
            "created_by_user_id" => $request->created_by_user_id,
            "read_count" => $request->read_count ?? 0,
        ];

        // Upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->store('articles', 'public');

            // Delete old image if exists
            if ($article->image) {
                Storage::disk('public')->delete('articles/' . $article->image);
            }

            $data['image'] = $image->hashName();
        }

        $article->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Article updated successfully',
            'data' => $article,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json([
                'success' => false,
                'message' => 'Article not found',
                'data' => null,
            ], 404);
        }

        if ($article->image) {
            Storage::disk('public')->delete('articles/' . $article->image);
        }

        $article->delete();

        return response()->json([
            'success' => true,
            'message' => 'Article deleted successfully',
            'data' => null,
        ]);
    }
}
