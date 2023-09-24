<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;


class AlphaVantagePrices
{


    public function getExchangeRateFromAlphaVantage($symbol)
    {
        $apiKey = "M4QY5D98C0W2G5BB";
        $endpoint = "https://www.alphavantage.co/query";
        $response = Http::get($endpoint, [
            'function' => 'CURRENCY_EXCHANGE_RATE',
            'from_currency' => substr($symbol, 0, 3),
            'to_currency' => substr($symbol, 4, 3),
            'apikey' => $apiKey,
        ]);

        $data = $response->json();
        
        if (isset($data['Information'])) {
            return 0;
        } elseif (isset($data["Realtime Currency Exchange Rate"]['5. Exchange Rate'])) {
            return $data["Realtime Currency Exchange Rate"]['5. Exchange Rate'];
        } else {
            return 0;
        }
    }

}