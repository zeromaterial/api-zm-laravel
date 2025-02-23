<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::with('user', 'campaign', 'paymentMethod', 'donationType')->get();

        if ($donations->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No donations found.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Donations retrieved successfully.',
            'data' => $donations,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'campaign_id' => 'required|exists:campaigns,id',
            'user_id' => 'required|exists:users,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'donation_type_id' => 'required|exists:donation_types,id',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $uniqueCode = "DN-" . strtoupper(uniqid());

        $donation = Donation::create([
            'campaign_id' => $request->campaign_id,
            'user_id' => $request->user_id,
            'payment_method_id' => $request->payment_method_id,
            'donation_type_id' => $request->donation_type_id,
            'donation_code' => $uniqueCode,
            'amount' => $request->amount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Donation created successfully',
            'data' => $donation,
        ], 201);
    }

    public function show(string $id)
    {
        $donation = Donation::with('user', 'campaign', 'paymentMethod', 'donationType')->find($id);

        if (!$donation) {
            return response()->json([
                'success' => false,
                'message' => 'Donation not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Donation retrieved successfully',
            'data' => $donation,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $donation = Donation::find($id);

        if (!$donation) {
            return response()->json([
                'success' => false,
                'message' => 'Donation not found',
                'data' => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'status',
        ]);

        $donation->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Donation updated successfully',
            'data' => $donation,
        ]);
    }

    public function destroy($id)
    {
        $donation = Donation::find($id);

        if (!$donation) {
            return response()->json([
                'success' => false,
                'message' => 'Donation not found',
                'data' => null,
            ], 404);
        }

        $donation->delete();

        return response()->json([
            'success' => true,
            'message' => 'Donation deleted successfully',
            'data' => null,
        ]);
    }
}
