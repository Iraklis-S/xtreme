<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class ForecastsController extends Controller
{
    private $stocks = [
        ['symbol' => 'AAPL', 'company' => 'Apple Inc.'],
        ['symbol' => 'TSLA', 'company' => 'TESLA.'],
        ['symbol' => 'MSFT', 'company' => 'Microsoft'],
     ['symbol' => 'AMZN', 'company' =>'Amazon']
    ];
   
    public function index()
    {
        $stockSignals = [];

        foreach ($this->stocks as $stock) {
            $signal = $this->signals($stock['symbol']);
            $stockSignals[] = [
                'symbol' => $stock['symbol'],
                'company' => $stock['company'],
                'signal' => $signal,
            ];
        }

        return view('auth-views.signals', compact('stockSignals'));
    }
    public function signals($stockName)
    {
        $response = Http::get('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol='.$stockName.'&apikey=M4QY5D98C0W2G5BB');
        $response = $response->json();
        try {
        // Get the "Time Series (Daily)" data
        $timeSeries = $response['Time Series (Daily)'];
        }catch(\Exception $e){
            return $e->getMessage();
        }
        // Initialize an array to store the closing prices
        $closingPrices = [];
    
        // Iterate through the time series data
        foreach ($timeSeries as $date => $data) {
            $close = $data['4. close']; // Get the "close" value using dot notation
   
            // Add the closing price to the array
            $closingPrices[$date] = $close;
        }
    
        // Now $closingPrices contains the closing prices for each date
        $total = 0;
        $dates = array_keys($closingPrices);
        for ($i = 0; $i < 30; $i++) {
            $date = $dates[$i];
            $total += $closingPrices[$date];
            }
        $average = $total / count($closingPrices);
    
        $yesterdayDate = date('Y-m-d', strtotime('-1 day'));
        $priceToday =  $closingPrices[$yesterdayDate];
   
        if ($priceToday < $average) {
            $prognosis = 'BUY';
        } else {
            $prognosis = 'SELL';
        }
    
        return $prognosis;
    }
    
}
