<?php

namespace App\Listeners;

use App\Jobs\SendTradeProfitNotificationJob;
use Illuminate\Support\Facades\Mail;
use App\Events\PriceThresholdReached;
use App\Mail\TradeProfitNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyUserOfPriceThreshold
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PriceThresholdReached $event)
    {
        $user = $event->user;
        $arrayTrades = $event->arrayTrades;
        dispatch(new SendTradeProfitNotificationJob($user, $arrayTrades));
}
}