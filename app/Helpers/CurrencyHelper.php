<?php 

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class CurrencyHelper {
    public static function convert($amount, $from = 'CAD', $to = 'USD') {
        if ($from === $to) return (float) $amount; // Ensure numeric return

        $cacheKey = "exchange_rate_{$from}_{$to}";

        // Cache the exchange rate for 24 hours to avoid excessive API calls
        $exchangeRate = Cache::remember($cacheKey, 86400, function () use ($from, $to) {
            $url = "https://api.frankfurter.app/latest?from={$from}&to={$to}";
            $response = Http::get($url)->json();
            return $response['rates'][$to] ?? 1; // Default to 1 if API fails
        });

        $convertedAmount = (float) $amount * $exchangeRate;

        // If converting to USD, add a 10% charge
        if ($to === 'USD') {
            $convertedAmount *= 1.1;
        }

        return $convertedAmount;
    }
}
