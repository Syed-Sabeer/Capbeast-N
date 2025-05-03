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
            'weight' => isset($request->package) && isset($request->package['weight'])
                ? floatval($request->package['weight'])
                : array_sum(array_map(function ($product) {
                    $weight = floatval($product['weight']);
                    $quantity = intval($product['quantity'] ?? 1);
                    // Convert to lbs if needed
                    if (isset($product['weight_unit']) && strtolower($product['weight_unit']) === 'kg') {
                        $weight *= 2.20462; // Convert kg to lbs
                    }
                    return $weight * $quantity;
                }, $products)),
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

                // Check if rates are empty or missing
                $hasRates = isset($rates['rates']) && !empty($rates['rates']);
                if (!$hasRates) {
                    // Get country code to determine fallback rates
                    $country = isset($payload['to_address']['country_code'])
                        ? strtoupper($payload['to_address']['country_code'])
                        : 'UNKNOWN';

                    Log::info('No shipping rates returned by API, using fallback rates for country: ' . $country);

                    // Get package weight for price calculations
                    $weight = $payload['weight'] ?? 16; // Default to 16 lbs if not specified

                    // Base price calculation (increases with weight but capped)
                    $basePrice = min(20 + ($weight * 0.5), 60);

                    // Default to USD
                    $currency = 'USD';

                    // Adjust price and currency based on destination country
                    if ($country === 'CA') {
                        $currency = 'CAD';
                        $basePrice *= 1.2; // 20% higher for Canada
                    } else if (in_array($country, ['GB', 'DE', 'FR', 'IT', 'ES'])) {
                        $currency = 'EUR';
                        $basePrice *= 1.5; // 50% higher for Europe
                    } else if (in_array($country, ['AU', 'NZ'])) {
                        $currency = 'AUD';
                        $basePrice *= 1.8; // 80% higher for Oceania
                    } else if ($country !== 'US') {
                        // All other international destinations
                        $basePrice *= 2.0; // Double price for international
                    }

                    // Calculate tiered prices
                    $standardPrice = floor($basePrice) - 0.01; // $19.99 format
                    $expeditedPrice = floor($basePrice * 1.5) - 0.01;
                    $expressPrice = floor($basePrice * 2.0) - 0.01;

                    // Default carrier name and prefix
                    $carrierName = 'International';
                    $servicePrefix = strtolower($country) . '_';

                    // Customize carrier name for major countries
                    if ($country === 'US') {
                        $carrierName = 'USPS';
                        // Fixed prices for US
                        $standardPrice = 24.99;
                        $expeditedPrice = 34.99;
                        $expressPrice = 49.99;
                    } else if ($country === 'CA') {
                        $carrierName = 'Canada Post';
                        // Fixed prices for Canada
                        $standardPrice = 19.99;
                        $expeditedPrice = 29.99;
                        $expressPrice = 39.99;
                    } else if (in_array($country, ['GB', 'DE', 'FR', 'IT', 'ES'])) {
                        $carrierName = 'European';
                    }

                    // Prepare fallback shipping rates
                    $rates['rates'] = [
                        [
                            'postage_type_id' => $servicePrefix . 'standard',
                            'postage_type' => $carrierName . ' Standard',
                            'trackable' => true,
                            'package_type' => 'Parcel',
                            'base_rate' => $standardPrice,
                            'add_ons' => [
                                [
                                    'name' => 'Insurance',
                                    'type' => 'insurance',
                                    'cost' => 0,
                                    'currency' => $currency
                                ]
                            ],
                            'rate' => $standardPrice,
                            'gst' => 0,
                            'pst' => 0,
                            'hst' => 0,
                            'qst' => 0,
                            'tax' => 0,
                            'total' => $standardPrice,
                            'currency' => $currency,
                            'delivery_days' => '7-14'
                        ],
                        [
                            'postage_type_id' => $servicePrefix . 'expedited',
                            'postage_type' => $carrierName . ' Expedited',
                            'trackable' => true,
                            'package_type' => 'Parcel',
                            'base_rate' => $expeditedPrice,
                            'add_ons' => [
                                [
                                    'name' => 'Insurance',
                                    'type' => 'insurance',
                                    'cost' => 0,
                                    'currency' => $currency
                                ]
                            ],
                            'rate' => $expeditedPrice,
                            'gst' => 0,
                            'pst' => 0,
                            'hst' => 0,
                            'qst' => 0,
                            'tax' => 0,
                            'total' => $expeditedPrice,
                            'currency' => $currency,
                            'delivery_days' => '5-10'
                        ],
                        [
                            'postage_type_id' => $servicePrefix . 'express',
                            'postage_type' => $carrierName . ' Express',
                            'trackable' => true,
                            'package_type' => 'Parcel',
                            'base_rate' => $expressPrice,
                            'add_ons' => [
                                [
                                    'name' => 'Insurance',
                                    'type' => 'insurance',
                                    'cost' => 0,
                                    'currency' => $currency
                                ]
                            ],
                            'rate' => $expressPrice,
                            'gst' => 0,
                            'pst' => 0,
                            'hst' => 0,
                            'qst' => 0,
                            'tax' => 0,
                            'total' => $expressPrice,
                            'currency' => $currency,
                            'delivery_days' => '3-7'
                        ]
                    ];

                    // Also set data field for frontend compatibility
                    $rates['data'] = $rates['rates'];
                    $rates['note'] = 'Using estimated shipping rates';

                    Log::info('Generated fallback shipping rates', [
                        'country' => $country,
                        'weight' => $weight,
                        'rates' => $rates['rates']
                    ]);
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
                    'Stallion Express API error: ' . $errorMessage
                );

                // Add fallback shipping options for all countries when API fails
                if (isset($payload['to_address']['country_code'])) {
                    $country = $payload['to_address']['country_code'];
                    $weight = $payload['weight'] ?? 0;

                    // Base prices that scale with weight
                    $basePrice = min(20 + ($weight * 0.5), 60); // Price increases with weight but caps at 60

                    // Determine currency based on country
                    $currency = 'USD';
                    if ($country === 'CA') {
                        $currency = 'CAD';
                        // For Canada, apply a slight increase
                        $basePrice *= 1.2;
                    } else if (in_array($country, ['GB', 'DE', 'FR', 'IT', 'ES'])) {
                        // European countries
                        $currency = 'EUR';
                        $basePrice *= 1.5; // European shipping costs more
                    } else if (in_array($country, ['AU', 'NZ'])) {
                        // Australia and New Zealand
                        $currency = 'AUD';
                        $basePrice *= 1.8; // Oceania shipping costs more
                    } else if (in_array($country, ['JP', 'KR', 'CN', 'HK', 'SG'])) {
                        // Asian countries
                        $basePrice *= 1.7; // Asian shipping costs more
                    } else if ($country !== 'US') {
                        // Rest of the world
                        $basePrice *= 2.0; // International shipping costs more
                    }

                    // Round to nearest .99
                    $standardPrice = floor($basePrice) - 0.01;
                    $expeditedPrice = floor($basePrice * 1.5) - 0.01;
                    $expressPrice = floor($basePrice * 2.0) - 0.01;

                    $servicePrefix = strtolower($country) . '_';
                    $carrierName = 'International';

                    // Override for specific countries
                    if ($country === 'US') {
                        $carrierName = 'USPS';
                    } else if ($country === 'CA') {
                        $carrierName = 'Canada Post';
                    } else if (in_array($country, ['GB', 'DE', 'FR', 'IT', 'ES'])) {
                        $carrierName = 'European';
                    }

                    // Prepare fallback rates
                    $fallbackRates = [
                        'success' => true,
                        'data' => [
                            [
                                'postage_type_id' => $servicePrefix . 'standard',
                                'postage_type' => $carrierName . ' Standard',
                                'rate' => $standardPrice,
                                'total' => $standardPrice,
                                'currency' => $currency,
                                'delivery_days' => '7-14'
                            ],
                            [
                                'postage_type_id' => $servicePrefix . 'expedited',
                                'postage_type' => $carrierName . ' Expedited',
                                'rate' => $expeditedPrice,
                                'total' => $expeditedPrice,
                                'currency' => $currency,
                                'delivery_days' => '5-10'
                            ],
                            [
                                'postage_type_id' => $servicePrefix . 'express',
                                'postage_type' => $carrierName . ' Express',
                                'rate' => $expressPrice,
                                'total' => $expressPrice,
                                'currency' => $currency,
                                'delivery_days' => '3-7'
                            ]
                        ]
                    ];

                    // Specially handle US and CA for better customer experience
                    if ($country === 'US') {
                        $fallbackRates['data'] = [
                            [
                                'postage_type_id' => 'us_standard',
                                'postage_type' => 'USPS Standard',
                                'rate' => 24.99,
                                'total' => 24.99,
                                'currency' => 'USD',
                                'delivery_days' => '5-8'
                            ],
                            [
                                'postage_type_id' => 'us_priority',
                                'postage_type' => 'USPS Priority',
                                'rate' => 34.99,
                                'total' => 34.99,
                                'currency' => 'USD',
                                'delivery_days' => '3-5'
                            ],
                            [
                                'postage_type_id' => 'us_express',
                                'postage_type' => 'USPS Express',
                                'rate' => 49.99,
                                'total' => 49.99,
                                'currency' => 'USD',
                                'delivery_days' => '1-3'
                            ]
                        ];
                    } else if ($country === 'CA') {
                        $fallbackRates['data'] = [
                            [
                                'postage_type_id' => 'ca_standard',
                                'postage_type' => 'Canada Post Standard',
                                'rate' => 19.99,
                                'total' => 19.99,
                                'currency' => 'CAD',
                                'delivery_days' => '5-7'
                            ],
                            [
                                'postage_type_id' => 'ca_expedited',
                                'postage_type' => 'Canada Post Expedited',
                                'rate' => 29.99,
                                'total' => 29.99,
                                'currency' => 'CAD',
                                'delivery_days' => '3-5'
                            ],
                            [
                                'postage_type_id' => 'ca_express',
                                'postage_type' => 'Canada Post Express',
                                'rate' => 39.99,
                                'total' => 39.99,
                                'currency' => 'CAD',
                                'delivery_days' => '1-3'
                            ]
                        ];
                    }

                    Log::info('Using fallback shipping rates', [
                        'country' => $country,
                        'rates' => $fallbackRates
                    ]);

                    return response()->json([
                        'success' => true,
                        'shipping' => $fallbackRates,
                        'note' => 'Using estimated rates due to carrier API error'
                    ]);
                }

                // If we can't determine the country, return error
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to fetch shipping rates.',
                    'errors' => isset($response['errors']) ? $response['errors'] : ['An error occurred while retrieving rates.']
                ]);
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
