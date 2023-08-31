<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosedTrade extends Model
{
    use HasFactory;
    protected $fillable = [
        'open',
        'close_price',
        'trade_id',
    ];
    public function trade()
{
    return $this->belongsTo(Trading::class, 'trade_id');
}
}
