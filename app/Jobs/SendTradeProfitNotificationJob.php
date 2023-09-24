<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\TradeProfitNotification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendTradeProfitNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   protected $user;
    protected $arrayTrades;

    public function __construct(\App\Models\User $user, array $arrayTrades)
    {
        $this->user = $user;
        $this->arrayTrades = $arrayTrades;
    }
    /**
     * Execute the job.
     */
    public function handle()
    {
        // Send email notification to the user
        Mail::to($this->user->email)->send(new TradeProfitNotification($this->user, $this->arrayTrades));
    }
}
