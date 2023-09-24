<?php

namespace App\Console\Commands;

use App\Models\Trading;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Services\AlphaVantagePrices;
use App\Events\PriceThresholdReached;
use App\Mail\TradeProfitNotification;
use App\Listeners\NotifyUserOfPriceThreshold;

class MonitorTradeProfits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:monitor-trade-profits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Array to store trade information.
     *
     * @var array
     */

    /**
     * Execute the console command.
     *
     * @param AlphaVantagePrices $alphaVantagePrices
     * @return void
     */
    public function handle(AlphaVantagePrices $alphaVantagePrices)
    {
        try{
        // Fetch open trades and their associated users efficiently
        $openTrades = Trading::whereHas('closedTrade', function ($query) {
            $query->where('status', 'open');
        })
        ->with('userAccount.user')
        ->get();

        $usersWithOpenTrades = [];
      
        foreach ($openTrades as $trade) {
            $currentPrice = $alphaVantagePrices->getExchangeRateFromAlphaVantage($trade->symbol);
        
            $openPrice = $trade->price;
            $profitPercentage = abs(($currentPrice - $openPrice) / $openPrice) * 100;
    
            if ($profitPercentage >= 20) {
                // Check if the trade has a user relationship through userAccount
                if ($trade->userAccount && $trade->userAccount->user) {
                    $user = $trade->userAccount->user;
        
                    // Create an array for the user if it doesn't exist
                    if (!isset($usersWithOpenTrades[$user->id])) {
                        $usersWithOpenTrades[$user->id] = [
                            'user' => $user,
                            'trades' => [],
                        ];
                    }
                   
                    // Add the trade to the user's trades array
                    $usersWithOpenTrades[$user->id]['trades'][] = [
                        'trade_id' => $trade->id,
                        'message' => 'Price is over 20%',
                    ];
                } else {
                    // Handle the case where the trade doesn't have a valid user relationship
                    Log::channel('price-mail-cmd')->warning('Trade ID ' . $trade->id . ' has no valid user relationship.');
                }
            }
        }

        // Dispatch events and put them in the queue for each user with open trades
        foreach ($usersWithOpenTrades as $userData) {
            $user = $userData['user'];
            $arrayTrades = $userData['trades'];
           
            if (!empty($arrayTrades)) {
                event(new PriceThresholdReached($user, $arrayTrades));
            }  
        }

        Log::channel('price-mail-cmd')->info('PriceThreshold Events Dispatched for users with open trades');
    }catch(\Exception $e){
        Log::channel('price-mail-cmd')->error($e->getMessage());
    }
}

}