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
            'destination.address' => 'required|string',
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

        $payload = [
            'to_address' => [
                'name' => 'Customer',
                'company' => '',
                'address1' => $destination['address'],
                'address2' => '',
                'city' => 'Rock Springs',
                'province_code' => 'WY',
                'postal_code' => $destination['postal_code'],
                'country_code' => strtoupper($destination['country']),
                'phone' => '5145618019',
                'email' => 'customer@example.com',
                'is_residential' => true
            ],
            'return_address' => [
                'name' => 'Beast Group Inc.',
                'company' => 'Beast Group Inc.',
                'address1' => 'Unit 5 - 2045 Niagara Falls Blvd',
                'address2' => 'SE #100085',
                'city' => 'Niagara Falls',
                'province_code' => 'NY',
                'postal_code' => '14304',
                'country_code' => 'US',
                'phone' => '5145618019',
                'email' => 'info@capbeast.com',
                'is_residential' => false
            ],
            'is_return' => false,
            'weight_unit' => 'kg',
            'weight' => array_sum(array_map(function ($product) {
                return floatval($product['weight']) * (intval($product['quantity'] ?? 1));
            }, $products)),
            'length' => 3,
            'width' => 3,
            'height' => 3,
            'size_unit' => 'cm',
            'items' => array_map(function ($product) {
                return [
                    'description' => 'Product',
                    'sku' => 'SKU123',
                    'quantity' => intval($product['quantity'] ?? 1),
                    'value' => 100,
                    'currency' => 'CAD',
                    'country_of_origin' => 'CA',
                    'hs_code' => '123456',
                    'manufacturer_name' => 'Beast Group Inc.',
                    'manufacturer_address1' => 'Unit 5 - 2045 Niagara Falls Blvd',
                    'manufacturer_city' => 'Niagara Falls',
                    'manufacturer_province_code' => 'NY',
                    'manufacturer_postal_code' => '14304',
                    'manufacturer_country_code' => 'US'
                ];
            }, $products),
            'package_type' => 'Parcel',
            'postage_types' => [],
            'signature_confirmation' => true,
            'insured' => true
        ];

        Log::info('Sending shipping rate request to Stallion Express', $payload);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer lyuIwPalBwOrRYIMkFRaCbhLK81cYQUOuu6IGF2naZlzQIpdSQduK5faXfB7',
                'Content-Type' => 'application/json'
            ])->post('https://sandbox.stallionexpress.ca/api/v4/rates', $payload);

            if ($response->successful()) {
                $rates = $response->json();
                Log::info('Stallion Express response received', $rates);

                // Convert rates to USD if needed
                if (isset($rates['rates'])) {
                    foreach ($rates['rates'] as &$rate) {
                        if (isset($rate['total'])) {
                            // Convert CAD to USD (using approximate exchange rate)
                            $rate['price_usd'] = round($rate['total'] * 0.75, 2);
                        }
                    }
                }

                return response()->json([
                    'success' => true,
                    'shipping' => $rates
                ]);
            } else {
                Log::error('Stallion Express shipping API error', [
                    'status' => $response->status(),
                    'response_body' => $response->body()
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Failed to fetch shipping rate.',
                    'details' => $response->json()
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
