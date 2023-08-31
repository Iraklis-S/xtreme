<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DepositWithdraw extends Model
{
    protected $table = 'deposit_withdraw';
    public function userAccount()
    {
        return $this->belongsTo(UserAccount::class, 'user_account_id');
    }

    protected $fillable = [
        'user_account_id',
            'amount',
            'currency',
            'method',
            'transaction_type',
            'account_number',
            'bank_name',
            'bank_address',
            'description'
    ];
}