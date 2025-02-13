<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();

        if ($comments->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No comments found.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Comments retrieved successfully.',
            'data' => $comments,
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
            'campaign_id' => 'required|exists:campaign,id',
            'user_id' => 'required|exists:users,id',
            'comment_text' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors(),
            ], 400);
        }

        $comment = Comment::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Comment created successfully',
            'data' => $comment,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json([
                'success' => false,
                'message' => 'Comment not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Comment retrieved successfully',
            'data' => $comment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string$id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json([
                'success' => false,
                'message' => 'Comment not found',
                'data' => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'campaign_id' => 'required|exists:campaign,id',
            'user_id' => 'required|exists:users,id',
            'comment_text' => 'required|string',
            'comment_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $comment->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Comment updated successfully',
            'data' => $comment,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json([
                'success' => false,
                'message' => 'Comment not found',
                'data' => null,
            ], 404);
        }

        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment deleted successfully',
            'data' => null,
        ]);
    }
}
