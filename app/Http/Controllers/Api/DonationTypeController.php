<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonationTypeController extends Controller
{
    public function index()
    {
        $donationTypes = DonationType::all();

        if ($donationTypes->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No donation types found.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Donation types retrieved successfully.',
            'data' => $donationTypes,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $donationType = DonationType::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Donation type created successfully',
            'data' => $donationType,
        ]);
    }

    public function show(string $id)
    {
        $donationType = DonationType::find($id);

        if (!$donationType) {
            return response()->json([
                'success' => false,
                'message' => 'Donation type not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Donation type retrieved successfully',
            'data' => $donationType,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $donationType = DonationType::find($id);

        if (!$donationType) {
            return response()->json([
                'success' => false,
                'message' => 'Donation Type not found',
                'data' => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
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
            'description'
        ]);

        $donationType->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Donation Type updated successfully',
            'data' => $donationType,
        ]);
    }

    public function destroy($id)
    {
        $donationType = DonationType::find($id);

        if (!$donationType) {
            return response()->json([
                'success' => false,
                'message' => 'Donation Type not found',
                'data' => null,
            ], 404);
        }

        $donationType->delete();

        return response()->json([
            'success' => true,
            'message' => 'Donation Type deleted successfully',
            'data' => null,
        ]);
    }

}
