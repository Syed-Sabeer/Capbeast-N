<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderShippingDetail;
use App\Models\OrderShippingRate;
use App\Services\StallionExpressService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShipmentController extends Controller
{
    protected $stallionService;

    public function __construct(StallionExpressService $stallionService)
    {
        $this->stallionService = $stallionService;
    }

    public function getShipments(Request $request)
    {
        try {
            $query = [
                'from_date' => $request->input('from_date'),
                'to_date' => $request->input('to_date'),
                'ship_code' => $request->input('ship_code'),
                'to_name' => $request->input('to_name'),
                'tracking_code' => $request->input('tracking_code'),
                'order_id' => $request->input('order_id'),
                'batch_id' => $request->input('batch_id'),
                'closeout_id' => $request->input('closeout_id'),
                'status' => $request->input('status', 'unpaid'),
                'limit' => $request->input('limit', 10),
                'page' => $request->input('page', 1)
            ];

            $response = $this->stallionService->getShipments($query);

            return response()->json([
                'success' => true,
                'data' => $response
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching shipments: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch shipments',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function createShipment(Request $request)
    {
        try {
            $order = Order::findOrFail($request->input('order_id'));
            $shippingDetail = $order->ShippingDetails;
            $shippingRate = $order->shippingRate;

            if (!$shippingDetail || !$shippingRate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Shipping details or rate not found'
                ], 404);
            }

            $payload = [
                'to_address' => [
                    'name' => $shippingDetail->firstname . ' ' . $shippingDetail->lastname,
                    'company' => $shippingDetail->companyname,
                    'address1' => $shippingDetail->address,
                    'address2' => '',
                    'city' => $shippingDetail->city,
                    'province_code' => $shippingDetail->state,
                    'postal_code' => $shippingDetail->postal_code,
                    'country_code' => $shippingDetail->country,
                    'phone' => $shippingDetail->phone,
                    'email' => $shippingDetail->email,
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
                'weight' => $shippingRate->weight ?? 0.6,
                'length' => $shippingRate->length ?? 9,
                'width' => $shippingRate->width ?? 12,
                'height' => $shippingRate->height ?? 1,
                'size_unit' => 'cm',
                'items' => $order->items->map(function ($item) {
                    return [
                        'description' => $item->product->title,
                        'sku' => $item->product->sku,
                        'quantity' => $item->quantity,
                        'value' => $item->price,
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
                })->toArray(),
                'package_type' => 'Parcel',
                'signature_confirmation' => true,
                'postage_type' => $shippingRate->postage_type,
                'label_format' => 'pdf',
                'is_fba' => false,
                'is_draft' => false,
                'insured' => true
            ];

            Log::info('Creating shipment with payload', $payload);

            $response = $this->stallionService->createShipment($payload);

            Log::info('Shipment creation response', $response);

            if (!isset($response['success']) || !$response['success']) {
                throw new \Exception('Failed to create shipment: ' . ($response['message'] ?? 'Unknown error'));
            }

            // Update shipping rate with response data
            $updateData = [
                'label_base64' => $response['label'] ?? null,
                'tracking_number' => $response['tracking_code'] ?? null,
                'shipment_code' => $response['shipment'] ?? null,
                'carrier' => 'Stallion Express',
                'service_name' => $response['rate']['postage_type'] ?? null
            ];

            if (isset($response['rate'])) {
                $updateData = array_merge($updateData, [
                    'base_rate' => $response['rate']['base_rate'] ?? null,
                    'rate' => $response['rate']['rate'] ?? null,
                    'tax' => $response['rate']['tax'] ?? null,
                    'total' => $response['rate']['total'] ?? null,
                    'currency' => $response['rate']['currency'] ?? null,
                    'trackable' => $response['rate']['trackable'] ?? false,
                    'package_type' => $response['rate']['package_type'] ?? null,
                    'add_ons' => $response['rate']['add_ons'] ?? null,
                    'delivery_days' => $response['rate']['delivery_days'] ?? null,
                    'rate_details' => $response['rate'] ?? null
                ]);
            }

            Log::info('Updating shipping rate with data', $updateData);

            $shippingRate->update($updateData);

            // Update order with shipment details
            $order->update([
                'shipping_tracking_id' => $response['tracking_code'] ?? null,
                'shipping_carrier' => 'Stallion Express',
                'status' => 1 // Mark as shipped
            ]);

            Log::info('Shipment created successfully', [
                'order_id' => $order->id,
                'tracking_number' => $response['tracking_code'] ?? null
            ]);

            return response()->json([
                'success' => true,
                'data' => $response
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating shipment: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to create shipment',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
