<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ShippingController extends Controller
{
    /**
     * Calculate shipping rates from Stallion Express API.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getShippingRate(Request $request)
    {
        // Validate the inputs
        $validator = Validator::make($request->all(), [
            'weight' => 'required|numeric|min:0.01',
            'length' => 'required|numeric|min:0.01',
            'width' => 'required|numeric|min:0.01',
            'height' => 'required|numeric|min:0.01',
            'country' => 'required|string|max:2',
            'postal_code' => 'required|string|max:10',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed in shipping rate calculation', [
                'errors' => $validator->errors(),
                'request' => $request->all()
            ]);
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 400);
        }

        try {
            // Prepare payload for Stallion Express API
            $payload = [
                "carrier_type" => "stallion",
                "to_address" => [
                    "country" => $request->country,
                    "postal_code" => $request->postal_code,
                ],
                "parcels" => [
                    [
                        "weight" => $request->weight, // in pounds
                        "length" => $request->length, // in inches
                        "width"  => $request->width,
                        "height" => $request->height,
                    ]
                ],
            ];

            // Log the payload being sent to the API for debugging
            Log::info('Sending request to Stallion Express API', ['payload' => $payload]);

            // Send request to Stallion API for shipping rates
            $response = Http::withToken(config('services.stallion.api_key'))
                ->post('https://api.stallionexpress.ca/v1/shipping/rates', $payload);

            // Log the response from the API
            Log::info('Received response from Stallion Express API', ['response' => $response->body()]);

            if ($response->successful()) {
                $rates = $response->json();

                // Choose the cheapest rate (customize logic if needed)
                $cheapest = collect($rates['rates'])->sortBy('rate')->first();

                return response()->json([
                    'success' => true,
                    'rate' => $cheapest['rate'] ?? 0,
                    'service_name' => $cheapest['service_name'] ?? 'Standard',
                    'delivery_time' => $cheapest['estimated_days'] ?? 'N/A',
                ]);
            }

            // Log the error if the response is not successful
            Log::error('Failed to fetch shipping rates from Stallion Express API', [
                'response' => $response->body()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Unable to fetch shipping rates.',
                'response' => $response->body()
            ], 500);
        } catch (\Exception $e) {
            // Log any exception that occurs
            Log::error('Exception occurred while calculating shipping rate', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
