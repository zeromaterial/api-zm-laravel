<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::with('campaign')->get();

        if ($galleries->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No galleries found.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Galleries retrieved successfully.',
            'data' => $galleries,
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
            'campaign_id' => 'required|exists:campaigns,id',
            'gallery_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $image = $request->file('gallery_image');
        $image->store('galleries', 'public');

        $gallery = Gallery::create([
            'campaign_id' => $request->campaign_id,
            'gallery_image' => $image->hashName(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Gallery image uploaded successfully',
            'data' => $gallery,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::with('campaign')->find($id);

        if (!$gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Gallery retrieved successfully',
            'data' => $gallery,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery not found',
                'data' => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'campaign_id' => 'required|exists:campaigns,id',
            'gallery_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $data = [
            "campaign_id" => $request->campaign_id,
        ];

        if ($request->hasFile('gallery_image')) {
            $image = $request->file('gallery_image');
            $image->store('galleries', 'public');

            if ($gallery->gallery_image) {
                Storage::disk('public')->delete('galleries/' . $gallery->gallery_image);
            }

            $data['gallery_image'] = $image->hashName();
        }

        $gallery->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Gallery updated successfully',
            'data' => $gallery,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery item not found',
                'data' => null,
            ], 404);
        }

        if ($gallery->gallery_image) {
            Storage::disk('public')->delete('galleries/' . $gallery->gallery_image);
        }

        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gallery item deleted successfully',
            'data' => null,
        ]);
    }
}
