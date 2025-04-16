<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\OrderShippingRate;

class StallionExpressService
{
    protected $baseUrl;
    protected $token;

    public function __construct()
    {
        $this->baseUrl = config('services.stallion.sandbox', false)
            ? 'https://sandbox.stallionexpress.ca/api/v4'
            : config('services.stallion.base_url', 'https://api.stallionexpress.ca/api/v4');
        $this->token = config('services.stallion.token');
    }

    protected function headers()
    {
        return [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
    }

    public function getRates(array $payload)
    {
        try {
            // Log the request payload
            Log::info('Sending shipping rate request to Stallion Express', [
                'payload' => json_encode($payload, JSON_PRETTY_PRINT)
            ]);

            $response = Http::withHeaders($this->headers())
                ->post("{$this->baseUrl}/rates", $payload);

            $responseData = $response->json();

            // Log the response
            Log::info('Stallion Express Rate Response', [
                'response' => json_encode($responseData, JSON_PRETTY_PRINT)
            ]);

            if (!$response->successful()) {
                Log::error('Stallion Express shipping API error', [
                    'status' => $response->status(),
                    'response_body' => $responseData
                ]);
                return [
                    'success' => false,
                    'message' => $responseData['message'] ?? 'Failed to fetch shipping rates',
                    'errors' => $responseData['errors'] ?? []
                ];
            }

            return $responseData;
        } catch (\Exception $e) {
            Log::error('Error in StallionExpressService::getRates', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getShipments(array $query = [])
    {
        $response = Http::withHeaders($this->headers())
            ->get("{$this->baseUrl}/shipments", $query);
        return $response->json();
    }

    public function createShipment($payload, $orderId)
    {
        try {
            // Validate required fields
            $requiredFields = [
                'to_address.city',
                'to_address.province_code',
                'to_address.postal_code',
                'items.0.description',
                'items.0.value'
            ];

            $missingFields = [];
            foreach ($requiredFields as $field) {
                $value = data_get($payload, $field);
                if (empty($value)) {
                    $missingFields[] = $field;
                }
            }

            if (!empty($missingFields)) {
                Log::error('Missing required fields in shipment payload:', [
                    'missing_fields' => $missingFields,
                    'payload' => $payload
                ]);
                throw new \Exception('Missing required fields: ' . implode(', ', $missingFields));
            }

            // Validate US ZIP code against state
            if (data_get($payload, 'to_address.country_code') === 'US') {
                $stateCode = data_get($payload, 'to_address.province_code');
                $zipCode = data_get($payload, 'to_address.postal_code');

                if (!$this->validateUsZipCodeState($zipCode, $stateCode)) {
                    Log::error('ZIP code validation failed:', [
                        'zip_code' => $zipCode,
                        'state_code' => $stateCode
                    ]);
                    throw new \Exception("The ZIP code {$zipCode} does not match the state {$stateCode}. Please verify the shipping address.");
                }
            }

            // Format and validate Canadian postal code
            if (data_get($payload, 'to_address.country_code') === 'CA') {
                $postalCode = data_get($payload, 'to_address.postal_code');
                $formattedPostalCode = $this->formatCanadianPostalCode($postalCode);

                if (!$formattedPostalCode) {
                    Log::error('Invalid Canadian postal code:', [
                        'postal_code' => $postalCode
                    ]);
                    throw new \Exception("The postal code {$postalCode} is not a valid Canadian postal code format (A1A 1A1).");
                }

                // Update the payload with the formatted postal code
                data_set($payload, 'to_address.postal_code', $formattedPostalCode);
            }

            // Log the complete request payload
            Log::info('Stallion Express Shipment Request:', [
                'url' => $this->baseUrl . '/shipments',
                'payload' => json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
            ]);

            // Generate idempotency key based on order ID
            $idempotencyKey = 'order-' . $orderId . '-' . time();

            $response = Http::withHeaders(array_merge($this->headers(), [
                'Idempotency-Key' => $idempotencyKey
            ]))
                ->post($this->baseUrl . '/shipments', $payload);

            // Log the raw response first
            Log::info('Stallion Express Raw Response:', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            $responseData = $response->json();

            // Log the complete parsed response
            Log::info('Stallion Express Shipment Response:', [
                'response' => json_encode($responseData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
            ]);

            if (!$response->successful()) {
                Log::error('Stallion Express API Error:', [
                    'status' => $response->status(),
                    'error' => $responseData
                ]);
                throw new \Exception('Failed to create shipment: ' . ($responseData['message'] ?? 'Unknown error'));
            }

            // Validate response structure
            if (!isset($responseData['success']) || !$responseData['success']) {
                Log::error('Invalid response structure:', [
                    'response' => $responseData
                ]);
                throw new \Exception('Invalid response from Stallion Express API');
            }

            // Check for tracking code
            if (!isset($responseData['tracking_code'])) {
                Log::error('No tracking code in response:', [
                    'response' => $responseData
                ]);
                throw new \Exception('No tracking code received from Stallion Express API');
            }

            // Update order with tracking information
            $order = Order::find($orderId);
            if ($order) {
                $order->update([
                    'shipping_tracking_id' => $responseData['tracking_code'],
                    'shipping_carrier' => $responseData['rate']['postage_type'] ?? null,
                    'shipping_service' => $responseData['rate']['package_type'] ?? null,
                    'shipping_estimated_days' => $responseData['rate']['delivery_days'] ?? null,
                ]);

                // Update or create shipping rate record
                OrderShippingRate::updateOrCreate(
                    ['order_id' => $orderId],
                    [
                        'tracking_number' => $responseData['tracking_code'],
                        'tracking_url' => $responseData['tracking_url'] ?? null,
                        'label_url' => $responseData['label_url'] ?? null,
                        'label_base64' => $responseData['label'] ?? null,
                        'postage_type' => $responseData['rate']['postage_type'] ?? null,
                        'package_type' => $responseData['rate']['package_type'] ?? null,
                        'shipping_price' => $responseData['rate']['rate'] ?? null,
                        'delivery_days' => $responseData['rate']['delivery_days'] ?? null,
                        'service_name' => $responseData['rate']['postage_type'] ?? null,
                        'rate_details' => $responseData['rate'] ?? []
                    ]
                );
            }

            return $responseData;
        } catch (\Exception $e) {
            Log::error('Stallion Express Shipment Creation Error:', [
                'error' => $e->getMessage(),
                'payload' => $payload,
                'order_id' => $orderId
            ]);
            throw $e;
        }
    }

    public function trackShipment($tracking_code)
    {
        $response = Http::withHeaders($this->headers())
            ->get("{$this->baseUrl}/track", [
                'tracking_code' => $tracking_code,
            ]);

        return $response->json();
    }

    public function getShipmentDetails($ship_code)
    {
        $response = Http::withHeaders($this->headers())
            ->get("{$this->baseUrl}/shipments/{$ship_code}");

        return $response->json();
    }

    public function voidShipment($ship_code)
    {
        $response = Http::withHeaders($this->headers())
            ->get("{$this->baseUrl}/shipments/{$ship_code}/void");

        return $response->json();
    }

    /**
     * Format and log the shipment response
     *
     * @param array $responseData The shipment response data
     * @param int $orderId The order ID
     * @return array The formatted response
     */
    public function formatShipmentResponse($responseData, $orderId)
    {
        // Format response similar to the example
        $formattedResponse = [
            'success' => $responseData['success'] ?? false,
            'label' => $responseData['label'] ?? 'base64_label',
            'tracking_code' => $responseData['tracking_code'] ?? '',
            'message' => $responseData['message'] ?? 'Shipment processing complete',
            'shipment' => null,
            'rate' => [
                'postage_type' => $responseData['rate']['postage_type'] ?? '',
                'package_type' => $responseData['rate']['package_type'] ?? '',
                'trackable' => true,
                'base_rate' => $responseData['rate']['rate'] ?? 0,
                'add_ons' => [null],
                'rate' => $responseData['rate']['rate'] ?? 0,
                'tax' => $responseData['rate']['tax'] ?? 0,
                'total' => $responseData['rate']['total'] ?? 0,
                'currency' => $responseData['rate']['currency'] ?? 'CAD',
                'delivery_days' => $responseData['rate']['delivery_days'] ?? '2'
            ]
        ];

        // Log the formatted response
        Log::info('Formatted Stallion Express Shipment Response:', [
            'order_id' => $orderId,
            'response' => json_encode($formattedResponse, JSON_PRETTY_PRINT)
        ]);

        return $formattedResponse;
    }

    /**
     * Validate that a US ZIP code is valid for the given state
     * 
     * @param string $zipCode The ZIP code to validate
     * @param string $stateCode The state code to validate against
     * @return bool Whether the ZIP code is valid for the state
     */
    private function validateUsZipCodeState($zipCode, $stateCode)
    {
        // Strip any non-numeric characters
        $zipCode = preg_replace('/[^0-9]/', '', $zipCode);

        // Basic ZIP code format validation
        if (strlen($zipCode) < 5) {
            return false;
        }

        // Use only the first 5 digits for validation
        $zipCode = substr($zipCode, 0, 5);

        // State to ZIP code prefix mapping
        $stateZipMap = [
            'AL' => ['35', '36'],
            'AK' => ['99'],
            'AZ' => ['85', '86'],
            'AR' => ['71', '72'],
            'CA' => ['90', '91', '92', '93', '94', '95', '96'],
            'CO' => ['80', '81'],
            'CT' => ['06'],
            'DE' => ['19'],
            'DC' => ['20'],
            'FL' => ['32', '33', '34'],
            'GA' => ['30', '31', '39'],
            'HI' => ['96'],
            'ID' => ['83'],
            'IL' => ['60', '61', '62'],
            'IN' => ['46', '47'],
            'IA' => ['50', '51', '52'],
            'KS' => ['66', '67'],
            'KY' => ['40', '41', '42'],
            'LA' => ['70', '71'],
            'ME' => ['03', '04'],
            'MD' => ['20', '21'],
            'MA' => ['01', '02', '05'],
            'MI' => ['48', '49'],
            'MN' => ['55', '56'],
            'MS' => ['38', '39'],
            'MO' => ['63', '64', '65'],
            'MT' => ['59'],
            'NE' => ['68', '69'],
            'NV' => ['89'],
            'NH' => ['03'],
            'NJ' => ['07', '08'],
            'NM' => ['87', '88'],
            'NY' => ['10', '11', '12', '13', '14'],
            'NC' => ['27', '28'],
            'ND' => ['58'],
            'OH' => ['43', '44', '45'],
            'OK' => ['73', '74'],
            'OR' => ['97'],
            'PA' => ['15', '16', '17', '18', '19'],
            'RI' => ['02'],
            'SC' => ['29'],
            'SD' => ['57'],
            'TN' => ['37', '38'],
            'TX' => ['75', '76', '77', '78', '79', '88'],
            'UT' => ['84'],
            'VT' => ['05'],
            'VA' => ['20', '22', '23', '24'],
            'WA' => ['98', '99'],
            'WV' => ['24', '25', '26'],
            'WI' => ['53', '54'],
            'WY' => ['82', '83'],
            'PR' => ['00']
        ];

        // Check if state exists in our map
        if (!isset($stateZipMap[$stateCode])) {
            // If we don't have mapping data, assume it's valid
            return true;
        }

        // Check if ZIP code prefix matches any in the state's list
        $zipPrefix = substr($zipCode, 0, 2);
        return in_array($zipPrefix, $stateZipMap[$stateCode]);
    }

    /**
     * Format and validate a Canadian postal code
     *
     * @param string $postalCode The postal code to format
     * @return string|false The formatted postal code or false if invalid
     */
    private function formatCanadianPostalCode($postalCode)
    {
        // Remove all spaces and convert to uppercase
        $postalCode = strtoupper(preg_replace('/\s+/', '', $postalCode));

        // Basic format check: A1A1A1 or A1A 1A1
        if (!preg_match('/^[A-Z][0-9][A-Z][0-9][A-Z][0-9]$/', $postalCode)) {
            // Try to format it if it's at least 6 characters
            if (strlen($postalCode) >= 6) {
                $postalCode = substr($postalCode, 0, 6);

                // Make sure it follows the pattern A1A1A1
                if (!preg_match('/^[A-Z][0-9][A-Z][0-9][A-Z][0-9]$/', $postalCode)) {
                    return false;
                }
            } else {
                return false;
            }
        }

        // Format as A1A 1A1
        return substr($postalCode, 0, 3) . ' ' . substr($postalCode, 3);
    }
}
