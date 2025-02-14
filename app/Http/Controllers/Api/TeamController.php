<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'member_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'member_role' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors(),
            ], 400);
        }

        $image = $request->file('member_image');
        $image->store('teams', 'public');

        $team = Team::create([
            'member_name' => $request->member_name,
            'member_image' => $image->hashName(),
            'member_role' =>  $request->member_role,
        ]);

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
            'member_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk gambar
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $data = [
            "member_name" => $request->member_name,
        ];

        // Handle image upload
        if ($request->hasFile('member_image')) {
            $image = $request->file('member_image');
            $image->store('teams', 'public'); // Simpan gambar ke folder 'teams' di disk 'public'

            // Hapus gambar lama jika ada
            if ($team->member_image) {
                Storage::disk('public')->delete('teams/' . $team->member_image);
            }

            $data['member_image'] = $image->hashName(); // Simpan nama file yang di-hash
        }

        $team->update($data); // Update data tim

        return response()->json([
            'success' => true,
            'message' => 'Team updated successfully',
            'data' => $team,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json([
                'success' => false,
                'message' => 'Team not found',
                'data' => null,
            ], 404);
        }

        if ($team->member_image) {
            Storage::disk('public')->delete('teams/' . $team->member_image);
        }

        $team->delete();

        return response()->json([
            'success' => true,
            'message' => 'Team deleted successfully',
            'data' => null,
        ]);
    }
}
