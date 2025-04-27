<?php

namespace App\Http\Controllers\Main;

use App\Helpers\CartHelper;
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
            'destination.state' => 'required|string',
            'destination.postal_code' => 'required|string',
            'destination.address' => 'nullable|string',
            'destination.city' => 'required|string'
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed for shipping calculation', [
                'errors' => $validator->errors()->all()
            ]);

            // Record the validation error
            CartHelper::trackError(
                'shipping',
                'Validation error: ' . implode(', ', $validator->errors()->all())
            );

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
                'address1' => $destination['address'] ?? '',
                'address2' => '',
                'city' => $destination['city'] ?? 'Montreal',
                'province_code' => $destination['state'],
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
            'weight_unit' => 'lbs',
            'weight' => min(array_sum(array_map(function ($product) {
                return floatval($product['weight']) * (intval($product['quantity'] ?? 1));
            }, $products)) * 2.20462, 30),
            'length' => min(max(array_map(function ($product) {
                return floatval($product['length']);
            }, $products)), 100),
            'width' => min(max(array_map(function ($product) {
                return floatval($product['width']);
            }, $products)), 100),
            'height' => min(max(array_map(function ($product) {
                return floatval($product['height']);
            }, $products)), 100),
            'size_unit' => 'cm',
            'items' => array_map(function ($product) {
                return [
                    'description' => 'Product',
                    'sku' => 'SKU123',
                    'quantity' => intval($product['quantity'] ?? 1),
                    'value' => 100,
                    'currency' => 'CAD',
                    'country_of_origin' => 'CN',
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
            'insured' => true,
            'region' => null,
            'tax_identifier' => [
                'tax_type' => 'IOSS',
                'number' => 'IM1234567890',
                'issuing_authority' => 'GB'
            ]
        ];

        Log::info('Sending shipping rate request to Stallion Express', $payload);

        try {
            $stallionService = new \App\Services\StallionExpressService();
            $response = $stallionService->getRates($payload);

            if (isset($response['success']) && $response['success']) {
                $rates = $response;
                Log::info('Stallion Express response received', $rates);

                // If rates array is empty for Canadian addresses, add default options
                if (
                    isset($rates['rates']) && empty($rates['rates']) &&
                    isset($payload['to_address']['country_code']) &&
                    $payload['to_address']['country_code'] === 'CA'
                ) {

                    Log::info('Adding fallback shipping rates for Canadian address', $payload);

                    // Add fallback shipping options for Canada
                    $rates['rates'] = [
                        [
                            'postage_type_id' => 'ca_standard',
                            'postage_type' => 'Canada Post Standard',
                            'trackable' => true,
                            'package_type' => 'Parcel',
                            'base_rate' => 15.99,
                            'add_ons' => [
                                [
                                    'name' => 'Insurance',
                                    'type' => 'insurance',
                                    'cost' => 3.00,
                                    'currency' => 'CAD'
                                ]
                            ],
                            'rate' => 18.99,
                            'gst' => 0.95,
                            'pst' => 0,
                            'hst' => 0,
                            'qst' => 0,
                            'tax' => 0.95,
                            'total' => 19.94,
                            'currency' => 'CAD',
                            'delivery_days' => '3-7'
                        ],
                        [
                            'postage_type_id' => 'ca_express',
                            'postage_type' => 'Canada Post Expedited',
                            'trackable' => true,
                            'package_type' => 'Parcel',
                            'base_rate' => 22.99,
                            'add_ons' => [
                                [
                                    'name' => 'Insurance',
                                    'type' => 'insurance',
                                    'cost' => 3.00,
                                    'currency' => 'CAD'
                                ]
                            ],
                            'rate' => 25.99,
                            'gst' => 1.30,
                            'pst' => 0,
                            'hst' => 0,
                            'qst' => 0,
                            'tax' => 1.30,
                            'total' => 27.29,
                            'currency' => 'CAD',
                            'delivery_days' => '2-4'
                        ],
                        [
                            'postage_type_id' => 'ca_priority',
                            'postage_type' => 'Canada Post Priority',
                            'trackable' => true,
                            'package_type' => 'Parcel',
                            'base_rate' => 34.99,
                            'add_ons' => [
                                [
                                    'name' => 'Insurance',
                                    'type' => 'insurance',
                                    'cost' => 3.00,
                                    'currency' => 'CAD'
                                ]
                            ],
                            'rate' => 37.99,
                            'gst' => 1.90,
                            'pst' => 0,
                            'hst' => 0,
                            'qst' => 0,
                            'tax' => 1.90,
                            'total' => 39.89,
                            'currency' => 'CAD',
                            'delivery_days' => '1-3'
                        ]
                    ];
                }

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
                    'status' => 500,
                    'response_body' => $response
                ]);

                // Make sure error is recorded in cart errors
                $errorMessage = isset($response['errors']) && is_array($response['errors'])
                    ? implode('; ', $response['errors'])
                    : ($response['message'] ?? 'Failed to fetch shipping rates');

                CartHelper::trackError(
                    'shipping',
                    'Shipping rate service error: ' . $errorMessage
                );

                return response()->json([
                    'success' => false,
                    'message' => 'Failed to fetch shipping rate.',
                    'details' => $response
                ], 500);
            }
        } catch (\Exception $e) {
            Log::critical('Exception during shipping rate calculation', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Record the shipping error
            CartHelper::trackError(
                'shipping',
                'Failed to calculate shipping rates: ' . $e->getMessage()
            );

            return response()->json([
                'success' => false,
                'message' => 'Failed to calculate shipping rates.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function createShipment(Request $request)
    {
        Log::info('Shipment creation request received', $request->all());

        // Validate request
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'shipping_method' => 'required|string',
            'shipping_price' => 'required|numeric',
            'shipping_service' => 'required|string',
            'shipping_estimated_days' => 'required|string',
            'customer' => 'required|array',
            'customer.name' => 'required|string',
            'customer.email' => 'required|email',
            'customer.phone' => 'required|string',
            'customer.address' => 'required|array',
            'customer.address.address1' => 'required|string',
            'customer.address.city' => 'required|string',
            'customer.address.state' => 'required|string',
            'customer.address.postal_code' => 'required|string',
            'customer.address.country' => 'required|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.weight' => 'required|numeric',
            'items.*.length' => 'required|numeric',
            'items.*.width' => 'required|numeric',
            'items.*.height' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed for shipment creation', [
                'errors' => $validator->errors()->all()
            ]);

            // Record the validation error
            CartHelper::trackError(
                'shipping',
                'Validation error in shipment creation: ' . implode(', ', $validator->errors()->all())
            );

            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();
        $customer = $validated['customer'];
        $address = $customer['address'];
        $items = $validated['items'];

        // Calculate total package dimensions
        $totalWeight = 0;
        $maxLength = 0;
        $maxWidth = 0;
        $maxHeight = 0;

        foreach ($items as $item) {
            $totalWeight += $item['weight'] * $item['quantity'];
            $maxLength = max($maxLength, $item['length']);
            $maxWidth = max($maxWidth, $item['width']);
            $maxHeight = max($maxHeight, $item['height']);
        }

        // Convert weight to lbs if needed
        $weightInLbs = $totalWeight;
        if ($request->input('weight_unit', 'kg') === 'kg') {
            $weightInLbs = $totalWeight * 2.20462;
        }

        // Prepare the shipment payload
        $payload = [
            'to_address' => [
                'name' => $customer['name'],
                'company' => '',
                'address1' => $address['address1'],
                'address2' => '',
                'city' => $address['city'],
                'province_code' => $address['state'],
                'postal_code' => $address['postal_code'],
                'country_code' => strtoupper($address['country']),
                'phone' => $customer['phone'],
                'email' => $customer['email'],
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
            'weight_unit' => 'lbs',
            'weight' => $weightInLbs,
            'length' => $maxLength,
            'width' => $maxWidth,
            'height' => $maxHeight,
            'size_unit' => 'cm',
            'items' => array_map(function ($item) {
                return [
                    'description' => 'Product',
                    'sku' => 'SKU123',
                    'quantity' => $item['quantity'],
                    'value' => 100,
                    'currency' => 'CAD',
                    'country_of_origin' => 'CN',
                    'hs_code' => '123456',
                    'manufacturer_name' => 'Beast Group Inc.',
                    'manufacturer_address1' => 'Unit 5 - 2045 Niagara Falls Blvd',
                    'manufacturer_city' => 'Niagara Falls',
                    'manufacturer_province_code' => 'NY',
                    'manufacturer_postal_code' => '14304',
                    'manufacturer_country_code' => 'US'
                ];
            }, $items),
            'package_type' => 'Parcel',
            'signature_confirmation' => true,
            'postage_type' => $validated['shipping_service'],
            'label_format' => 'pdf',
            'is_fba' => false,
            'is_draft' => false,
            'insured' => true,
            'region' => null,
            'tax_identifier' => [
                'tax_type' => 'IOSS',
                'number' => 'IM1234567890',
                'issuing_authority' => 'GB'
            ]
        ];

        Log::info('Sending shipment creation request to Stallion Express', $payload);

        try {
            $stallionService = new \App\Services\StallionExpressService();
            $response = $stallionService->createShipment($payload, $validated['order_id']);

            if (isset($response['success']) && $response['success']) {
                // Save shipment details to database
                $shipment = new \App\Models\Shipment([
                    'order_id' => $validated['order_id'],
                    'tracking_code' => $response['tracking_code'],
                    'label' => $response['label'],
                    'shipping_method' => $validated['shipping_method'],
                    'shipping_price' => $validated['shipping_price'],
                    'shipping_service' => $validated['shipping_service'],
                    'estimated_delivery_days' => $validated['shipping_estimated_days'],
                    'status' => 'created'
                ]);
                $shipment->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Shipment created successfully',
                    'shipment' => $shipment,
                    'tracking_code' => $response['tracking_code'],
                    'label' => $response['label']
                ]);
            } else {
                Log::error('Stallion Express shipment creation error', [
                    'status' => 500,
                    'response_body' => $response
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create shipment.',
                    'details' => $response
                ], 500);
            }
        } catch (\Exception $e) {
            Log::critical('Exception during shipment creation', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Record the shipping error
            CartHelper::trackError(
                'shipping',
                'Failed to create shipment: ' . $e->getMessage()
            );

            return response()->json([
                'success' => false,
                'message' => 'Failed to create shipment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
