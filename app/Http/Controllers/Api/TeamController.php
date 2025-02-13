<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();

        if ($teams->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No teams found.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Teams retrieved successfully.',
            'data' => $teams,
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
            'member_name' => 'required|string|max:255',
            'member_role' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors(),
            ], 400);
        }

        $team = Team::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Team member created successfully',
            'data' => $team,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json([
                'success' => false,
                'message' => 'Team not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Team retrieved successfully',
            'data' => $team,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json([
                'success' => false,
                'message' => 'Team not found',
                'data' => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'member_name' => 'required|string|max:255',
            'member_role' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $team->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Team updated successfully',
            'data' => $team,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json([
                'success' => false,
                'message' => 'Team not found',
                'data' => null,
            ], 404);
        }

        $team->delete();

        return response()->json([
            'success' => true,
            'message' => 'Team deleted successfully',
            'data' => null,
        ]);
    }
}
