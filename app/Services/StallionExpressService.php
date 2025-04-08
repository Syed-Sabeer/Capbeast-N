<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class StallionExpressService
{
    protected $baseUrl;
    protected $token;

    public function __construct()
    {
        $this->baseUrl = config('services.stallion.base_url');  // Get base URL from config
        $this->token = config('services.stallion.token');       // Get API key from config
    }

    protected function headers()
    {
        return [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
        ];
    }

    public function getRates(array $payload)
{
    $response = Http::withHeaders($this->headers())
        ->post("{$this->baseUrl}/rates", $payload);  // Make sure it's using the sandbox URL
    return $response->json();
}


    public function createShipment(array $payload)
    {
        $response = Http::withHeaders(array_merge($this->headers(), [
            'Idempotency-Key' => uniqid(),
        ]))->post("{$this->baseUrl}/shipments", $payload);

        return $response->json();
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
}
