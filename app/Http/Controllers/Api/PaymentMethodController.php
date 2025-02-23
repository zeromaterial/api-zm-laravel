<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();

        if ($paymentMethods->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No payment methods found.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Payment methods retrieved successfully.',
            'data' => $paymentMethods,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $paymentMethod = PaymentMethod::create([
            'name' => $request->name,
            'account_number' => $request->account_number,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Payment method created successfully',
            'data' => $paymentMethod,
        ]);
    }

    public function show(string $id)
    {
        $paymentMethod = PaymentMethod::find($id);

        if (!$paymentMethod) {
            return response()->json([
                'success' => false,
                'message' => 'Payment method not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Payment method retrieved successfully',
            'data' => $paymentMethod,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $paymentMethod = PaymentMethod::find($id);

        if (!$paymentMethod) {
            return response()->json([
                'success' => false,
                'message' => 'Payment Method not found',
                'data' => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
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
            'account_number'
        ]);

        $paymentMethod->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Payment Method updated successfully',
            'data' => $paymentMethod,
        ]);
    }

    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::find($id);

        if (!$paymentMethod) {
            return response()->json([
                'success' => false,
                'message' => 'Payment Method not found',
                'data' => null,
            ], 404);
        }

        $paymentMethod->delete();

        return response()->json([
            'success' => true,
            'message' => 'Payment Method deleted successfully',
            'data' => null,
        ]);
    }
}
