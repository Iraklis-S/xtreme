<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use App\Models\Trading;
use App\Models\ClosedTrade;
use App\Models\UserAccount;
use Illuminate\Http\Request;

class TradeController extends Controller
{

    public function showOpenTrades()
    {
        // Retrieve all open trades from the ClosedTrade table
        $openTrades = ClosedTrade::where('status', 'open')->whereHas('trade.userAccount', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
        ->get();
    
        // Return the view with the open trades data
        return view('auth-views.trade.trade-index', compact('openTrades'));
    }
    


    public function showTradeHistory()
    {
        // Retrieve all closed trades from the database
        $closedTrades = ClosedTrade::where('status', 'closed')->whereHas('trade.userAccount', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
        ->get();
    
        // Return the view with the closed trades data
        return view('auth-views.trade.trade-history', compact('closedTrades'));
    }



    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'symbol' => 'required|string',
            'quantity' => 'required|integer',
            'action' => 'required|in:buy,sell',
        ]);

        // Get the current exchange rate from Alpha Vantage
        $exchangeRate = $this->getExchangeRateFromAlphaVantage($validatedData['symbol']);

        // Assuming you have authenticated the user and have the user account available
        $userAccount = auth()->user()->userAccount;

        // Calculate the trade price based on the exchange rate and quantity
        $price = $exchangeRate * $validatedData['quantity'];

        // Create a new trade
        $trade = new Trading();
        $trade->user_account_id = $userAccount->id;
        $trade->symbol = $validatedData['symbol'];
        $trade->price = $price;
        $trade->quantity = $validatedData['quantity'];
        $trade->action = $validatedData['action'];
        $trade->save();

  // Create a corresponding row in the ClosedTrade table
        $closedTrade = new ClosedTrade();
    $closedTrade->trade_id = $trade->id;
    $closedTrade->status 
    = 'open';
    $closedTrade->save();
       // Return the user to the trading page
        return redirect()->route('charts')->with('success', 'Trade created successfully.');
    }

    private function getExchangeRateFromAlphaVantage($symbol)
    {
        $apiKey = "M4QY5D98C0W2G5BB";
        $endpoint = "https://www.alphavantage.co/query";

        $client = new Client();
        $response = $client->get($endpoint, [
            'query' => [
                'function' => 'CURRENCY_EXCHANGE_RATE',
                'from_currency' => substr($symbol, 0, 3),
                'to_currency' => substr($symbol, 4, 3),
                'apikey' => $apiKey,
            ],
            'verify' => false, // Disable SSL certificate verification
        ]);

        $data = json_decode($response->getBody(), true);

        $exchangeRate = $data['Realtime Currency Exchange Rate']['5. Exchange Rate'];

        return $exchangeRate;
    }



    public function closeTrade($tradeId)
{
    // Retrieve the trade record from the database
    $trade = Trading::findOrFail($tradeId);

    // Get the opening price and action from the trade record
    $openingPrice = $trade->price;
    $action = $trade->action;

    // Get the current price from Alpha Vantage or any other reliable data source
    $currentPrice = $this->getExchangeRateFromAlphaVantage($trade->symbol);

    // Calculate the profit based on the action and leverage
    $leverage = '';
    if ($trade->symbol == 'BTC/USD'){
    $leverage =10; }
    else{
        $leverage =100;
    }  // Default leverage
    $profit = ($action == 'buy') ? ($currentPrice - $openingPrice) * $leverage : ($openingPrice - $currentPrice) * $leverage;

    // Update the trade record with the profit
    $trade->profit = $profit;
    $trade->save();

    // Update closedtrade
    $closedTrade = ClosedTrade::where('trade_id', $tradeId)->first();
    $closedTrade->status = 'closed';
    $closedTrade->close_price = $currentPrice;
    $closedTrade->save();
  
    $userAccount = $trade->userAccount;
    if ($profit >= 0) {
        // Profit case: add the profit to the balance
        $userAccount->balance += $profit;
    } else {
        // Loss case: subtract the absolute value of the profit from the balance
        $userAccount->balance -= abs($profit);
    }
    $userAccount->save();

    // For example, redirect back to the trade page with a success message
    return redirect()->route('trade.index')->with('success', 'Trade closed successfully. Profit: ' . $profit);
}

}
