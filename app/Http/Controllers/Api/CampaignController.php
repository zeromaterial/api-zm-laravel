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
        $campaigns = Campaign::with('user')->get();

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
            'campaign_title' => 'required|string|max:255',
            'campaign_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'campaign_location' => 'required|string|max:255',
            'created_by_user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'plant_type' => 'required|string|max:255',
            'total_donation' => 'nullable|numeric',
            'total_trees_donated' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $image = $request->file('campaign_image');
        $image->store('campaigns', 'public');

        $campaign = Campaign::create([
            'campaign_title' => $request->campaign_title,
            'campaign_image' => $image->hashName(),
            'campaign_location' => $request->campaign_location,
            'created_by_user_id' => $request->created_by_user_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'plant_type' => $request->plant_type,
            'total_donation' => $request->total_donation ?? 0,
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
        $campaign = Campaign::with('user')->find($id);

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
            'campaign_title' => 'required|string|max:255',
            'campaign_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'campaign_location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'plant_type' => 'required|string|max:255',
            'total_donation' => 'nullable|numeric',
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

        $data = [
            "campaign_title" => $request->campaign_title,
            "campaign_location" => $request->campaign_location,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "plant_type" => $request->plant_type,
            "total_donation" => $request->total_donation ?? 0,
            "total_trees_donated" => $request->total_trees_donated ?? 0,
            "isactive" => $request->isactive ?? 0,
        ];

        // Upload image
        if ($request->hasFile('campaign_image')) {
            $image = $request->file('campaign_image');
            $image->store('campaigns', 'public');

            // Delete old image if exists
            if ($campaign->campaign_image) {
                Storage::disk('public')->delete('campaigns/' . $campaign->campaign_image);
            }

            $data['campaign_image'] = $image->hashName();
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

        // Hapus gambar kampanye jika ada
        if ($campaign->campaign_image) {
            Storage::disk('public')->delete('campaigns/' . $campaign->campaign_image);
        }

        $campaign->delete();

        return response()->json([
            'success' => true,
            'message' => 'Campaign deleted successfully',
            'data' => null,
        ]);
    }
}
