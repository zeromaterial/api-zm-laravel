<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all();

        if ($plants->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No plants found.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Plants retrieved successfully.',
            'data' => $plants,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'description' => 'required|string',
            'growing_conditions' => 'required|string',
            'benefit' => 'required|string',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $image = $request->file('image');
        $image->store('plants', 'public');

        $plant = Plant::create([
            'name' => $request->name,
            'species' => $request->species,
            'image' => $image->hashName(),
            'description' => $request->description,
            'growing_conditions' => $request->growing_conditions,
            'benefit' => $request->benefit,
            'price' => $request->price,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Plant created successfully',
            'data' => $plant,
        ]);
    }


    public function show(string $id)
    {
        $plant = Plant::find($id);

        if (!$plant) {
            return response()->json([
                'success' => false,
                'message' => 'Plant not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Plant retrieved successfully',
            'data' => $plant,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $plant = Plant::find($id);

        if (!$plant) {
            return response()->json([
                'success' => false,
                'message' => 'Plant not found',
                'data' => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'species' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'description' => 'nullable|string',
            'growing_conditions' => 'nullable|string',
            'benefit' => 'nullable|string',
            'price' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'name',
            'species',
            'image',
            'description',
            'growing_conditions',
            'benefit',
            'price'
        ]);

        if ($request->hasFile('image')) {
            if ($plant->image) {
                Storage::disk('public')->delete('plants/' . $plant->image);
            }

            $image = $request->file('image');
            $imagePath = $image->store('plants', 'public');

            $data['image'] = basename($imagePath);
        }

        $plant->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Plant updated successfully',
            'data' => $plant,
        ]);
    }

    public function destroy($id)
    {
        $plant = Plant::find($id);

        if (!$plant) {
            return response()->json([
                'success' => false,
                'message' => 'Plant not found',
                'data' => null,
            ], 404);
        }

        if ($plant->image) {
            Storage::disk('public')->delete('plants/' . $plant->image);
        }

        $plant->delete();

        return response()->json([
            'success' => true,
            'message' => 'Plant deleted successfully',
            'data' => null,
        ]);
    }
}
