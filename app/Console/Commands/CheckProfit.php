<?php

namespace App\Console\Commands;

use App\Services\AlphaVantagePrices;
use GuzzleHttp\Client;
use App\Models\Trading;
use App\Models\ClosedTrade;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\TradeController;

class CheckProfit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-profit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(TradeController $tradeController, AlphaVantagePrices $alphaVantagePrices)
    {
        // Retrieve open trades with TP or SL values
        $openTrades = Trading::whereHas('closedTrade', function ($query) {
            $query->where('status', 'open');
        })
            ->where(function ($query) {
                $query->whereNotNull('take_profit')
                    ->orWhereNotNull('stop_loss');
            })
            ->get();


        foreach ($openTrades as $trade) {
            // Extract currency pair symbol from the trade
            $symbol = $trade->symbol;
            $exchangeRate  = $alphaVantagePrices->getExchangeRateFromAlphaVantage($symbol);

            $this->checkTpSl($tradeController, $trade, $exchangeRate);


            Log::channel('check-profit-cmd')->info('Fetched price: ' . $exchangeRate . 'For :' . $trade->symbol);
        }
    }


    private function checkTpSl($tradeController, $trade, $currentPrice)
    {
        if ($trade->take_profit != 0) {
            if ($trade->action == 'buy') {
                if ($currentPrice >= $trade->take_profit) {
                    $tradeController->closeTrade($trade);
                }
            } else {
                if ($currentPrice <= $trade->take_profit) {
                    $tradeController->closeTrade($trade);
                }
            }
        } elseif ($trade->stop_loss != 0) {
            if ($trade->action == 'buy') {
                if ($currentPrice <= $trade->stop_loss) {
                    $tradeController->closeTrade($trade);
                }
            } else {
                if ($currentPrice >= $trade->stop_loss) {
                    $tradeController->closeTrade($trade);
                }
            }
        }
    }
}