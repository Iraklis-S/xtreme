<?php

namespace App\Http\Controllers;

use App\Http\Requests\TradeRequest;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Trading;
use App\Models\ClosedTrade;
use App\Models\MarketList;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\AlphaVantagePrices;

class TradeController extends Controller
{
    private $alphaVantageService;
    public function __construct(AlphaVantagePrices $alphaVantagePrices)
    {
        $this->alphaVantageService = $alphaVantagePrices;
    }



    public function charts(){
        $markets = MarketList::all();
        return view('auth-views.charts',compact('markets'));
    }
    
    public function tradeInfo($tradeId)
    {
        $trade = Trading::findOrFail($tradeId);
        $symbol = $trade->symbol;
        $currentPrice =  $this->alphaVantageService->getExchangeRateFromAlphaVantage($symbol);
        $currentProfit = 0;

        if ($trade->symbol == 'BTC/USD') {
            $currentProfit = ($currentPrice - $trade->price) * 30 * $trade->quantity;
        } else {
            $currentProfit =  ($currentPrice - $trade->price) * 100 * $trade->quantity;
        }
        return response()->json($currentProfit);
    }

    public function showOpenTrades()
    {
        // Retrieve all open trades from the ClosedTrade table
        $openTrades = ClosedTrade::where('status', 'open')->whereHas('trade.userAccount', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();
        // Return the view with the open trades data
        return view('auth-views.trade.trade-index', compact('openTrades'));
    }



    public function showTradeHistory()
    {// Retrieve all closed trades from the database
        $closedTrades = ClosedTrade::where('status', 'closed')->whereHas('trade.userAccount', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();

        // Return the view with the closed trades data
        return view('auth-views.trade.trade-history', compact('closedTrades'));
    }



    public function store(TradeRequest $request)
    {
        $validatedData = $request->validated(); // Get validated the form data from the TradeRequest
        $symbol  = $validatedData['symbol'];
        $exchangeRate = $this->alphaVantageService->getExchangeRateFromAlphaVantage($symbol);  // Get the current exchange rate from Alpha Vantage
        if (auth('web')->user()->userAccount->balance <= $exchangeRate * $validatedData['quantity']) {
            return redirect()->route('charts')->with('error', 'Insufficent Balance!');
        } else {
            $trade = Trading::create([ // Create a new trade
                'user_account_id' => auth()->user()->userAccount->id,
                'symbol' => $validatedData['symbol'],
                'price' => $exchangeRate,
                'quantity' => $validatedData['quantity'],
                'action' => $validatedData['action'],
                'take_profit' => ($validatedData['take_profit'] != 0) ? $validatedData['take_profit'] : null,
                'stop_loss' => ($validatedData['stop_loss'] != 0) ? $validatedData['stop_loss'] : null,
            ]);
        }
        // Create a corresponding row in the ClosedTrade table
        $closedTrade = ClosedTrade::create([
            'trade_id' => $trade->id,
            'status' => 'open',
        ]);
        // Return the user to the trading page
        return redirect()->route('charts')->with('success', 'Trade created successfully.');
    }



    public function closeTrade($tradeId)
    {  // Retrieve the trade record from the database
        $trade = Trading::findOrFail($tradeId);
        // Get the opening price and action from the trade record
        $openingPrice = $trade->price;
        $action = $trade->action;
        // Get the current price from Alpha Vantage or any other reliable data source
        $currentPrice = $this->alphaVantageService->getExchangeRateFromAlphaVantage($trade->symbol);
        // Calculate the profit based on the action and leverage
        $leverage = '';
        if ($trade->symbol == 'BTC/USD') {
            $leverage = 10;
        } else {
            $leverage = 100;
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
