<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonies = Testimony::with('user')->get();

        if ($testimonies->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No testimonies found.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Testimonies retrieved successfully.',
            'data' => $testimonies,
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
            'user_id' => 'required|exists:users,id',
            'testimony_quotes' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors(),
            ], 400);
        }

        $testimony = Testimony::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Testimony created successfully',
            'data' => $testimony,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimony = Testimony::with('user')->find($id);

        if (!$testimony) {
            return response()->json([
                'success' => false,
                'message' => 'Testimony not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Testimony retrieved successfully',
            'data' => $testimony,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimony $testimony)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimony = Testimony::find($id);

        if (!$testimony) {
            return response()->json([
                'success' => false,
                'message' => 'Testimony not found',
                'data' => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'testimony_quotes' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $testimony->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Testimony updated successfully',
            'data' => $testimony,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimony = Testimony::find($id);

        if (!$testimony) {
            return response()->json([
                'success' => false,
                'message' => 'Testimony not found',
                'data' => null,
            ], 404);
        }

        $testimony->delete();

        return response()->json([
            'success' => true,
            'message' => 'Testimony deleted successfully',
            'data' => null,
        ]);
    }
}
