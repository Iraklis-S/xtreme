<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trading extends Model
{
    use HasFactory;
    protected $fillable = [
        'symbol',
        'user_account_id',
        'take_profit',
        'stop_loss',
        'quantity',
        'action',
        'price',
    ];

    public function closedTrade()
{
    return $this->hasOne(ClosedTrade::class, 'trade_id');
}
    public function userAccount()
    {
        return $this->belongsTo(UserAccount::class);
    }
}
