<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\get;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::with('user', 'plant', 'donations')->get();

        if ($campaigns->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No campaigns found.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Campaigns retrieved successfully.',
            'data' => $campaigns,
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
            'location' => 'required|string|max:255',
            'created_by_user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'plant_id' => 'required|exists:plants,id',
            'target_donation' => 'required|numeric',
            'collected_donation' => 'nullable|numeric',
            'total_trees_donated' => 'nullable|integer',
            'isactive' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $image = $request->file('image');
        $image->store('campaigns', 'public');

        $campaign = Campaign::create([
            'title' => $request->title,
            'image' => $image->hashName(),
            'location' => $request->location,
            'created_by_user_id' => $request->created_by_user_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'plant_id' => $request->plant_id,
            'target_donation' => $request->target_donation,
            'collected_donation' => $request->collected_donation ?? 0,
            'total_trees_donated' => $request->total_trees_donated ?? 0,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Campaign created successfully',
            'data' => $campaign,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $campaign = Campaign::with('user', 'plant', 'donations')->find($id);

        if (!$campaign) {
            return response()->json([
                'success' => false,
                'message' => 'Campaign not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Campaign retrieved successfully',
            'data' => $campaign,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $campaign = Campaign::find($id);

        if (!$campaign) {
            return response()->json([
                'success' => false,
                'message' => 'Campaign not found',
                'data' => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'plant_type' => 'nullable|string|max:255',
            'target_donation' => 'nullable|numeric',
            'collected_donation' => 'nullable|integer',
            'total_trees_donated' => 'nullable|integer',
            'isactive' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'title',
            'location',
            'start_date',
            'end_date',
            'plant_type',
            'target_donation',
            'collected_donation',
            'total_trees_donated',
            'isactive'
        ]);

        if ($request->hasFile('image')) {
            if ($campaign->image) {
                Storage::disk('public')->delete('campaigns/' . $campaign->image);
            }

            $image = $request->file('image');
            $imagePath = $image->store('campaigns', 'public');

            $data['image'] = basename($imagePath);
        }

        $campaign->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Campaign updated successfully',
            'data' => $campaign,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $campaign = Campaign::find($id);

        if (!$campaign) {
            return response()->json([
                'success' => false,
                'message' => 'Campaign not found',
                'data' => null,
            ], 404);
        }

        if ($campaign->image) {
            Storage::disk('public')->delete('campaigns/' . $campaign->image);
        }

        $campaign->delete();

        return response()->json([
            'success' => true,
            'message' => 'Campaign deleted successfully',
            'data' => null,
        ]);
    }
}
