<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{
    public function calculate(Request $request)
    {
        Log::info('Shipping calculation request received', $request->all());

        // Validate request
        $validator = Validator::make($request->all(), [
            'products' => 'required|array',
            'products.*.weight' => 'required|numeric',
            'products.*.weight_unit' => 'required|string',
            'products.*.length' => 'required|numeric',
            'products.*.width' => 'required|numeric',
            'products.*.height' => 'required|numeric',
            'products.*.size_unit' => 'required|string',
            'products.*.quantity' => 'nullable|integer',
            'destination' => 'required|array',
            'destination.country' => 'required|string',
            'destination.postal_code' => 'required|string',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed for shipping calculation', [
                'errors' => $validator->errors()->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();
        $products = $validated['products'];
        $destination = $validated['destination'];

        $packages = [];

        foreach ($products as $index => $product) {
            $packages[] = [
                'weight' => [
                    'value' => $product['weight'],
                    'unit' => $product['weight_unit']
                ],
                'dimensions' => [
                    'length' => $product['length'],
                    'width' => $product['width'],
                    'height' => $product['height'],
                    'unit' => $product['size_unit']
                ],
                'quantity' => $product['quantity'] ?? 1
            ];
        }

        $payload = [
            'from' => [
                'country' => 'CA',
                'postal_code' => 'L4W2T7'
            ],
            'to' => [
                'country' => $destination['country'],
                'postal_code' => $destination['postal_code']
            ],
            'packages' => $packages // ← THIS WAS EMPTY EARLIER
        ];
        
        

        Log::info('Sending shipping rate request to Stallion Express', $payload);

        try {
            $response = Http::withToken('lyuIwPalBwOrRYIMkFRaCbhLK81cYQUOuu6IGF2naZlzQIpdSQduK5faXfB7')
                ->post('https://sandbox.stallionexpress.ca/api/v4/rates', $payload);

            if ($response->successful()) {
                Log::info('Stallion Express response received', $response->json());
                return response()->json([
                    'success' => true,
                    'shipping' => $response->json()
                ]);
            } else {
                Log::error('Stallion Express shipping API error', [
                    'status' => $response->status(),
                    'response_body' => $response->body()
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Failed to fetch shipping rate.',
                    'details' => $response->body()
                ], $response->status());
            }
        } catch (\Exception $e) {
            Log::critical('Exception during shipping rate calculation', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while calculating shipping.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
