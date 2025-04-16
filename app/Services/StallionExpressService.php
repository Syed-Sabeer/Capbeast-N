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
}
